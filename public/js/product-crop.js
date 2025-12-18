console.log("[crop] script loaded");
document.addEventListener("DOMContentLoaded", () => {
    const mainFile = document.getElementById("mainFile");
    const previewWrap = document.getElementById("previewWrap");
    const previewImg = document.getElementById("previewImg");
    const cropBtn = document.getElementById("cropBtn");
    const mainErr = document.getElementById("mainErr");
    const currentImg = document.getElementById("currentImg"); // может быть null

    let cropper = null;

    /* ---------- при загрузке страницы ---------- */
    if (currentImg) {
        // форма уже содержит картинку – показываем её
        previewWrap.classList.add("d-none");
        previewImg.src = currentImg.src;
    }

    /* ---------- выбор нового файла ---------- */
    mainFile.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (!file) return;

        if (!file.type.startsWith("image/")) {
            showErr("Не изображение");
            return;
        }
        if (file.size > 3 * 1024 * 1024) {
            showErr("> 3 МБ");
            return;
        }

        // скрываем старую картинку (если есть)
        if (currentImg) currentImg.style.display = "none";

        const reader = new FileReader();
        reader.onload = (evt) => {
            previewImg.src = evt.target.result;
            previewWrap.classList.remove("d-none");
            cropBtn.classList.remove("d-none");

            if (cropper) cropper.destroy();
            cropper = new Cropper(previewImg, {
                aspectRatio: 1.65,
                viewMode: 1,
                autoCropArea: 0,
                scalable: true,
                zoomable: false,
            });
        };
        reader.readAsDataURL(file);
    });

    /* ---------- обрезка ---------- */
    cropBtn.addEventListener("click", () => {
        if (!cropper) return;
        const canvas = cropper.getCroppedCanvas({
            width: 600,
            height: 400,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: "high",
        });
        canvas.toBlob(
            (blob) => {
                if (!blob) return;
                const file = new File([blob], "cropped.jpg", {
                    type: "image/jpeg",
                });
                const dt = new DataTransfer();
                dt.items.add(file);
                mainFile.files = dt.files;

                cropBtn.textContent = "Обрезано ✓";
                cropBtn.disabled = true;
                previewImg.src = canvas.toDataURL("image/jpeg", 0.9);
                cropper.destroy();
                cropper = null;
            },
            "image/jpeg",
            0.9
        );
    });

    function showErr(msg) {
        mainErr.textContent = msg;
        mainFile.value = "";
    }
});
