<div x-data="{ open: false }" x-show="open"
    @sweet-alert.window="
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start', 
            showConfirmButton: false, 
            timer: 3000, 
            timerProgressBar: true, 
            background: '#F2FFE9',
            didOpen: (toast)=> {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire({
            icon : event.detail.icon,
            title : event.detail.title
        })
    ">

</div>
