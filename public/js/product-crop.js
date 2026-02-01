document.addEventListener("DOMContentLoaded", () => {
    const imageInput = document.getElementById("imageInput");
    const imagesHidden = document.getElementById("imagesHidden");
    const previewImg = document.getElementById("previewImg");
    const previewWrap = document.getElementById("previewWrap");
    const cropBtn = document.getElementById("cropBtn");
    const imagesPreview = document.getElementById("imagesPreview");

    let cropper = null;
    let croppedImages = []; // ← храним готовые File

    /* ---------- выбор файла ---------- */
    imageInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (!file || croppedImages.length >= 3) return;

        const reader = new FileReader();
        reader.onload = (evt) => {
            previewImg.src = evt.target.result;
            previewWrap.classList.remove("d-none");
            cropBtn.classList.remove("d-none");

            if (cropper) cropper.destroy();
            cropper = new Cropper(previewImg, {
                aspectRatio: 1.65,
                viewMode: 1,
            });
        };
        reader.readAsDataURL(file);
    });

    /* ---------- кроп ---------- */
    cropBtn.addEventListener("click", () => {
        if (!cropper) return;

        const canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 400,
        });

        canvas.toBlob((blob) => {
            const file = new File(
                [blob],
                `product_${Date.now()}.jpg`,
                { type: "image/jpeg" }
            );

            croppedImages.push(file);
            updateHiddenInput();
            addPreview(canvas.toDataURL("image/jpeg"));

            cropper.destroy();
            cropper = null;
            previewWrap.classList.add("d-none");
            cropBtn.classList.add("d-none");
            imageInput.value = "";
        }, "image/jpeg", 0.9);
    });

    /* ---------- обновляем hidden input ---------- */
    function updateHiddenInput() {
        const dt = new DataTransfer();
        croppedImages.forEach(file => dt.items.add(file));
        imagesHidden.files = dt.files;
    }

    /* ---------- превью ---------- */
    function addPreview(src) {
        const img = document.createElement("img");
        img.src = src;
        img.style.width = "120px";
        img.style.borderRadius = "6px";
        imagesPreview.appendChild(img);
    }
});
