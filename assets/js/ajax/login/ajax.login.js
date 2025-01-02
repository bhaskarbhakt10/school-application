import { getFormAction, AjaxCall, FailurePrompt, SuccessPrompt, HideShowPass } from "../../defaults/defaults.js"

(function ($) {


    $(document.body).on('click', `.show-hide-pass`, function (e) {
        e.preventDefault();
        const This = $(this);
        HideShowPass(This);
    });





    const Action = getFormAction(`#login`);
    console.log(Action);

    $(document.body).on('submit', '#login', async function (e) {
        e.preventDefault();
        const This = $(this);
        const ThisForm = $(This).closest(`form`);
        const formParent = $(ThisForm).parent()
        const data = $(ThisForm).serializeArray();


        try {
            const response = await AjaxCall(Action, data, 'Checking Users...', ThisForm);

            console.log('Response:', response);

            const { status, msg, error, dashboard } = JSON.parse(response);


            let ResponsePrompt = '';

            console.log(status);

            if (status === false) {
                if (error === '') {
                    ResponsePrompt = FailurePrompt(msg);

                }
                else {

                    if (error !== '') {

                        error.forEach(error_msg => {
                            ResponsePrompt += FailurePrompt(error_msg);
                        });
                    }

                }
            }




            if (status === true) {

                ResponsePrompt = SuccessPrompt(msg);
            }


            $(ThisForm).append(ResponsePrompt);

            const timeout = setTimeout(async () => {
                $(formParent).find('[role="alert"]').remove();
                if (status === true) {
                    ThisForm.get(0).reset();

                    window.location = dashboard;



                }
            }, 2000);

        } catch (error) {



            throw new Error(error);
        }

    });

}(jQuery))