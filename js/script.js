checkFormFill('.add-contact-forms input');
sendDataID('.delete-item');

function sendDataID(selector) {
    let deleteItems = document.querySelectorAll(selector);
    deleteItems.forEach(el=>{
        $(el).bind('click', function () {
            let id = el.parentElement.parentElement.getAttribute('data-id');
            $.ajax({
                url: '/server.php',
                type: 'POST',
                data:({id: id}),
                dataType: 'text',
                success: function () {
                    console.log('successfull sended id: '+id);
                    location.reload();
                },
                error: function (error) {
                    console.error('error;');
                }
            });
        });
    });
}


function checkFormFill(form_inputs) {
        const inputs = document.querySelectorAll(form_inputs);
        document.querySelector('.add-contact-forms button').onclick =
            function (e) {
            setInterval(()=>{
                e.preventDefault();
                inputs.forEach(input=>{
                    if (!input.value) {
                        input.style.border = "1px dotted red";
                    }

                })
            }
                ,3000)

            }

}


