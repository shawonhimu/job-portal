async function showLoader() {
    document.getElementById("preloader").classList.remove("d-none");
}
async function hideLoader() {
    document.getElementById("preloader").classList.add("d-none");
}

function successToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        close: true,
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        },
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        close: true,
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        },
    }).showToast();
}
