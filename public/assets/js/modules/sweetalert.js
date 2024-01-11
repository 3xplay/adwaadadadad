$('.approvebtn').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Approve this Transaction",
        icon: 'question',
        showCancelButton: true,
        timer: 4000,
        timerProgressBar: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $(e.target).closest('form').submit() // Post the surrounding form

        }
    })

});

$('.rejectbtn').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Reject this Transaction",
        icon: 'question',
        showCancelButton: true,
        timer: 4000,
        timerProgressBar: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $(e.target).closest('form').submit() // Post the surrounding form

        }
    })

});

$('.deletebnr').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Delete this Banner",
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

$('.chngthme').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Change Theme",
        icon: 'question',
        showCancelButton: true,
        timer: 4000,
        timerProgressBar: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $(e.target).closest('form').submit() // Post the surrounding form

        }
    })

});