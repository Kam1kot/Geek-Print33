document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("liveSearch");
    const drop = document.getElementById("searchDrop");
    const rows = [...document.querySelectorAll(".admin-table tbody tr")];

    /* строим индекс один раз */
    const index = rows.map((r) => ({
        el: r,
        text: r.cells[2].textContent.trim().toLowerCase(), // колонка «Название»
        top: r.offsetTop,
    }));

    /* показать/скрыть выпадашку */
    function toggleDrop(show) {
        drop.style.display = show ? "block" : "none";
    }

    /* очистить подсветку */
    function clearHighlight() {
        rows.forEach((r) => r.classList.remove("highlight"));
    }

    /* клик по элементу выпадашки */
    drop.addEventListener("click", async (e) => {
        if (!e.target.dataset.id) return;
        const id = e.target.dataset.id;

        /* 1. Где товар? */
        const res = await fetch(`/admin/products/locate?id=${id}`);
        const { found, page } = await res.json();
        if (!found) return; // товар удалён из БД

        /* 2. Есть ли он уже в текущей таблице? */
        const here = document.querySelector(`tr[data-product-id="${id}"]`);
        if (here) {
            toggleDrop(false);
            searchInput.value = "";
            here.classList.add("highlight");
            here.scrollIntoView({ behavior: "smooth", block: "center" });
            return;
        }

        /* 3. Переходим на нужную страницу с меткой */
        const url = new URL(location);
        url.searchParams.set("page", page);
        url.searchParams.set("highlight", id);
        location.href = url.toString(); // полная перезагрузка
    });

    /* ввод в поле */
    let abortCtrl;
    searchInput.addEventListener("input", async () => {
        const q = searchInput.value.trim();
        if (!q) {
            toggleDrop(false);
            return;
        }

        /* прервать предыдущий запрос, если он ещё летит */
        if (abortCtrl) abortCtrl.abort();
        abortCtrl = new AbortController();

        try {
            const res = await fetch(
                `/admin/products/search-json?q=${encodeURIComponent(q)}`,
                { signal: abortCtrl.signal }
            );

            /* если вернулся не JSON – пропускаем */
            if (!res.ok) throw new Error(res.status);

            const data = await res.json();

            drop.innerHTML = data
                .map(
                    (p) =>
                        `<div class="dropdown-item" data-id="${p.id}">${p.title}</div>`
                )
                .join("");
            toggleDrop(true);
        } catch (err) {
            /* игнорируем именно прерывание, остальное – по желанию */
            if (err.name === "AbortError") return;

            console.warn("Ошибка поиска:", err);
            toggleDrop(false);
        }
    });

    /* прячем выпадашку при клике вне */
    document.addEventListener("click", (e) => {
        if (
            !e.target.closest("#liveSearch") &&
            !e.target.closest("#searchDrop")
        )
            toggleDrop(false);
    });
    console.log("Строк в таблице:", rows.length);
    console.log("Индекс:", index);
});
