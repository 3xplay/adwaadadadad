@if (session('success'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif @if (session('error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
<script>
    $('.delusr').click(function(e) {
        e.preventDefault();
    
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Delete this User",
            icon: 'question',
            showCancelButton: true,
            timer: 4000,
            timerProgressBar: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(e.target).closest('form').submit() // Post the surrounding form
    
            }
        })
    
    });
</script>