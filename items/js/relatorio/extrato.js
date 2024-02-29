const extrato = document.querySelectorAll(".extrato");
const itemsPerPage = 3;
let currentPage = 1;

function showItems(page) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    extrato.forEach((item, index) => {
        if (index >= startIndex && index < endIndex) {
            item.style.display = "grid";
        } else {
            item.style.display = "none";
        }
    });
}

function updatePagination(totalPages) {
    const ulTag = document.querySelector("ul");
    let liTag = '';

    for (let i = 1; i <= totalPages; i++) {
        liTag += `<li class="numb ${currentPage === i ? 'atualPagination' : ''}" onclick="changePage(${i})"><span>${i}</span></li>`;
    }

    ulTag.innerHTML = liTag;
}

function changePage(page) {
    currentPage = page;
    showItems(currentPage);
    updatePagination(Math.ceil(extrato.length / itemsPerPage));
    element(Math.ceil(extrato.length / itemsPerPage), currentPage);
}

function element(totalPages, page) {
    const ulTag = document.querySelector("ul");
    let liTag = '';
    let activeLi;
    let beforePages = page - 1;
    let afterPages = page + 1;

    if (page > 1) {
        liTag += `<li class="btn" onclick="changePage(${page - 1})"><<</li>`;
    }
    if (page > 2) {
        liTag += `<li class="numb" onclick="changePage(1)">1</li>`;
        if (page > 3) {
            liTag += `<li class="dots">...</li>`;
        }
    }

    for (let pageLength = beforePages; pageLength <= afterPages; pageLength++) {
        if (pageLength > totalPages) {
            continue;
        }
        if (pageLength == 0) {
            pageLength = pageLength + 1;
        }

        if (page == pageLength) {
            activeLi = "atualPagination";
        } else {
            activeLi = "";
        }
        liTag += `<li class="numb ${activeLi}" onclick="changePage(${pageLength})"><span>${pageLength}</span></li>`;
    }

    if (page < totalPages - 1) {
        if (page < totalPages - 2) {
            liTag += `<li class="dots">...</li>`;
        }
        liTag += `<li class="numb" onclick="changePage(${totalPages})">${totalPages}</li>`;
    }

    if (page < totalPages) {
        liTag += `<li class="btn" onclick="changePage(${page + 1})">>></li>`;
    }

    ulTag.innerHTML = liTag;
}

showItems(currentPage);
updatePagination(Math.ceil(extrato.length / itemsPerPage));
element(Math.ceil(extrato.length / itemsPerPage), currentPage); 




// --------------VOCE---------------
const extratoVoce = document.querySelectorAll(".extratoVoce");
const itemsPerPageVoce = 3;
let currentPageVoce = 1;

function showItemsVoce(pageVoce) {
    const startIndexVoce = (pageVoce - 1) * itemsPerPageVoce;
    const endIndexVoce = startIndexVoce + itemsPerPageVoce;

    extratoVoce.forEach((item, index) => {
        if (index >= startIndexVoce && index < endIndexVoce) {
            item.style.display = "grid";
        } else {
            item.style.display = "none";
        }
    });
}

function updatePaginationVoce(totalPages) {
    const ulTagVoce = document.querySelector(".paginationVoce ul");
    let liTagVoce = '';

    for (let i = 1; i <= totalPages; i++) {
        liTagVoce += `<li class="numbVoce ${currentPageVoce === i ? 'atualPaginationVoce' : ''}" onclick="changePageVoce(${i})"><span>${i}</span></li>`;
    }

    ulTagVoce.innerHTML = liTagVoce;
}

function changePageVoce(page) {
    currentPageVoce = page;
    showItemsVoce(currentPageVoce);
    updatePaginationVoce(Math.ceil(extratoVoce.length / itemsPerPageVoce));
    elementVoce(Math.ceil(extratoVoce.length / itemsPerPageVoce), currentPageVoce);
}

function elementVoce(totalPagesVoce, page) {
    const ulTagVoce = document.querySelector(".paginationVoce ul");
    let liTagVoce = '';
    let activeLiVoce;
    let beforePagesVoce = page - 1;
    let afterPagesVoce = page + 1;

    if (page > 1) {
        liTagVoce += `<li class="btnVoce" onclick="changePageVoce(${page - 1})"><<</li>`;
    }
    if (page > 2) {
        liTagVoce += `<li class="numbVcoe" onclick="changePageVoce(1)">1</li>`;
        if (page > 3) {
            liTagVoce += `<li class="dotsVoce">...</li>`;
        }
    }

    for (let pageLengthVoce = beforePagesVoce; pageLengthVoce <= afterPagesVoce; pageLengthVoce++) {
        if (pageLengthVoce > totalPagesVoce) {
            continue;
        }
        if (pageLengthVoce == 0) {
            pageLengthVoce = pageLengthVoce + 1;
        }

        if (page == pageLengthVoce) {
            activeLiVoce = "atualPaginationVoce";
        } else {
            activeLiVoce = "";
        }
        liTagVoce += `<li class="numbVoce ${activeLiVoce}" onclick="changePageVoce(${pageLengthVoce})"><span>${pageLengthVoce}</span></li>`;
    }

    if (page < totalPagesVoce - 1) {
        if (page < totalPagesVoce - 2) {
            liTagVoce += `<li class="dotsVoce">...</li>`;
        }
        liTagVoce += `<li class="numbVoce" onclick="changePageVoce(${totalPagesVoce})">${totalPagesVoce}</li>`;
    }

    if (page < totalPagesVoce) {
        liTagVoce += `<li class="btnVoce" onclick="changePageVoce(${page + 1})">>></li>`;
    }

    ulTagVoce.innerHTML = liTagVoce;
}

showItemsVoce(currentPageVoce);
updatePaginationVoce(Math.ceil(extratoVoce.length / itemsPerPageVoce));
elementVoce(Math.ceil(extratoVoce.length / itemsPerPageVoce), currentPageVoce); 