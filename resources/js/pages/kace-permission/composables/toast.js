import Swal from 'sweetalert2'

export function useToast() {
    const kaceToast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });

    const toast =  (type, message) => kaceToast.fire({
        showCloseButton: true,
        icon: type,
        html: '<span class="font-normal text-xs w-auto m-0">' + message + '</span>',
        color: type === "success" ? "green" : "red",
    });
    
    return { toast };
}