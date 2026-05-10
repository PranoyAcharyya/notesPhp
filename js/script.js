$(document).ready(function(){

    $('#fabToggle').click(function(){

        $('#fabMenu').toggleClass('hidden');

        $(this).toggleClass('rotate-45');

    });


      // DELETE HANDLER

    $('#deleteBtn').click(function () {

        const noteId = $(this).data('id');

        const confirmDelete = confirm('Are you sure?');

        if (!confirmDelete) return;



        $.ajax({

            url: '/notesproject/utility/delete.php',

            method: 'POST',

            data: {
                id: noteId
            },

            success: function (response) {

                alert('Deleted Successfully');

                window.location.href = 'http://localhost/notesproject/NoteList.php';

            },

            error: function () {

                alert('Something went wrong');

            }

        });

    });

});