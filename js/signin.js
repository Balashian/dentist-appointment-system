function signInFailed() {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "error",
        title: "Incorrect username or password."
    });
    setTimeout(function () {
        window.location = "../index.php";
    }, 1500);
}

function signInSuccessful(isAdmin) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "Successful, redirecting in 2 seconds."
    });
    setTimeout(function () {
        if (isAdmin == 1) {
            window.location = "../admin/index.php";
        }
        else {
            window.location = "../user/index.php";
        }
    }, 1500);
}