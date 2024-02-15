<div x-data="{ open: false }" x-show="open"
    @confirm-delete.window="
        const get_id = event.detail.get_id;
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.confirmDelete(get_id).then(result=>{
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


                })

            }
        })
    ">

</div>
