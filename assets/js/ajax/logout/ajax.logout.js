import { AjaxCall } from "../../defaults/defaults.js"

(function ($) {

    $(document.body).on(`click`, `a.logout`, async function (e) {
        e.preventDefault();

        const This = $(this);
        const Action = $(This).data(`action`);
        const data = {
            logout: 1
        }

        try {
            const response = await AjaxCall(Action, data, '', '');

            console.log('Response:', response);

            const { status, msg, error, login } = JSON.parse(response);

            if (status === true) {
                window.location = login;
            }

        }
        catch (error) {
            console.error(error);
        }


    })

}(jQuery))