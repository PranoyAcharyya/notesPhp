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

// GSAP text reveal animation
window.onload = () => {
  const tl = gsap.timeline();

  const revealElements = [
    "#main-title",
  ];

  revealElements.forEach((selector, i) => {
    tl.fromTo(selector,
      { y: "100%", clipPath: "inset(0 0 100% 0)" },
      { y: "0%", clipPath: "inset(0 0 0% 0)", duration: 1, ease: "power3.out" },
      i * 0.4
    );
  });
};
