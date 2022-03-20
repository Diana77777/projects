
       
       const inputs = document.querySelectorAll('.form__input')
        var divError = document.querySelector('.error__block')
        $(divError).hide()
        function errorInput(name) {
            inputs.forEach(input => {
                if (input.getAttribute('name') == name) {
                    $(input).css('border', '1px solid #EB5757')
                }
            })
        }
        function clearInputs() {
            inputs.forEach(input => { $(input).css('border', '1px solid #000') })
        }
        $("#form").on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: 'php/termReg.php',
                method: 'post',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(data){
                    data = JSON.parse(data);
                    divError.innerHTML = '';
                    if ($(data.errors).length > 0) {
                        $(divError).show(200)
                        $(divError).css('background-color', '#f7bbbb')
                        $(divError).css('color', '#fff')
                        data.errors.forEach(item => {
                            divError.innerHTML += `<li>${item.text}</li>`;
                            errorInput(item.name)
                        })
                        return
                    }
                    if(data.message){
                        $(divError).css('background-color', '#f7bbbb')
                        $(divError).css('color', '#000')
                        $(divError).text(data.message)
                        $(divError).show(200)
                        location.href = "Auth.php";
                    }
                }
            }); 
        });
  