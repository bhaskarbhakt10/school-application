export const Loader = ($msg) => {
    let loader = '<div class="loader">';
    loader +=
        '<div class="d-flex justify-content-center flex-column align-items-center h-100">';
    loader += '<div class="spinner-grow text-primary" role="status">';
    loader += '<span class="visually-hidden">Loading...</span>';
    loader += "</div>";
    loader += "<div>";
    loader += '<p class="loader-text">' + $msg + "</p>";
    loader += "</div>";
    loader += "</div>";
    loader += "</div>";

    return loader;
};

export const SuccessPrompt = ($msg) => {
    let response_html =
        '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">';
    response_html += $msg;
    response_html += "</div>";

    return response_html;
};

export const FailurePrompt = ($msg) => {
    let response_html =
        '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">';
    response_html += $msg;
    response_html +=
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    response_html += "</div>";

    return response_html;
};


export const WarningPrompt = ($msg) => {
    let response_html =
        '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">';
    response_html += $msg;
    response_html +=
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    response_html += "</div>";

    return response_html;
};

export const SimpleModal = (
    $modalId,
    $modalHeading,
    $modalSize = null,
    $modalBodyclass = null,
    $modalBodyID = null
) => {
    let modal_html = `<div class="modal fade" id="modal-${$modalId}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-${$modalId}Label" aria-hidden="true">`;
    modal_html += `<div class="modal-dialog modal-dialog-centered ${$modalSize !== null ? $modalSize : ""
        }">`;
    modal_html += `<div class="modal-content">`;
    modal_html += `<div class="modal-header">`;
    modal_html += `<h1 class="modal-title fs-5" id="modal-${$modalId}Label">${$modalHeading}</h1>`;
    modal_html += `<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`;
    modal_html += `</div>`;
    modal_html += `<div class="modal-body ${$modalBodyclass !== null ? $modalBodyclass : ""
        }" id="${$modalBodyID !== null ? $modalBodyID : ""}">`;
    modal_html += `</div>`;
    modal_html += `</div>`;
    modal_html += `</div>`;
    modal_html += `</div>`;

    $(document.body).find("footer").append(modal_html);

    return `modal-${$modalId}`;
};

export const JSPath = () => {
    const pathname = location.pathname.split("/");
    const Pathname = pathname.filter((path) => {
        return (path !== "") & (path !== undefined) & (path !== null);
    });

    return location.origin + "/" + Pathname[0] + "/";
};

export const getCookie = ($val) => {
    const cookies = document.cookie.split(";");
    const cookie = cookies.filter((c) => {
        return c.includes($val);
    });

    if (Array.isArray(cookie) && cookie.length !== 0) {
        // console.log(cookie);
        return cookie[0].split("=").splice(-1).toString().replace(/%2F/g, "/");
    } else {
        return null;
    }
};


export const getFormAction = (formIdentifiedBy) => {

    const form = $(`${formIdentifiedBy}`);

    const formAction = $(form).attr('action');

    $(form).removeAttr('action');

    return formAction
}

export const AjaxCall = (Action, data, message, appendTo, contentType = true, processData = true) => {
    if (contentType !== false) {
        contentType = "application/x-www-form-urlencoded; charset=UTF-8";
    }
    return new Promise((resolve, reject) => {
        $.ajax({
            url: Action,
            method: 'POST',
            cache: false,
            data: data,
            contentType: contentType,
            processData: processData,
            beforeSend: function () {
                if (
                    (message !== '' && appendTo !== '')
                    ||
                    (message !== null && appendTo !== null)
                ) {
                    $(appendTo).css('position', 'relative');
                    const loader = Loader(message);
                    $(appendTo).append(loader);
                }
            },
            complete: function () {
                if (
                    (message !== '' && appendTo !== '')
                    ||
                    (message !== null && appendTo !== null)
                ) {
                    $(appendTo).find('.loader').remove();
                }
            },
            success: function (response) {
                resolve(response);
            },
            error: function (error) {
                reject(error);
            }
        })
    })
}



const runMutationFunction = (parent, callback) => {
    const $parentNode = $(parent);
    let $hasMutationHappened = false;
    let $mutationType = null;


    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'childList') {

                mutation.addedNodes.forEach((node) => {
                    console.log('Node added:', node);

                    $hasMutationHappened = true;
                    $mutationType = 1;


                    if (typeof callback === 'function') {


                        callback({
                            type: 'added',
                            node,
                            mutation,
                        });

                    }




                });


                mutation.removedNodes.forEach((node) => {
                    console.log('Node removed:', node);

                    $hasMutationHappened = true;
                    $mutationType = -1;

                    if (typeof callback === 'function') {


                        callback({
                            type: 'removed',
                            node,
                            mutation,
                        });

                    }
                });
            }
        });
    });


    const config = { childList: true };
    observer.observe($parentNode[0], config);

    return { mutation: $hasMutationHappened, type: $mutationType };
}


export const HideShowPass = ($this) => {

    const parent = $($this).closest('.field-parent');
    const thisField = $(parent).find(`.password-field`);
    const eye = $($this).find('i');

    if ($(thisField).attr('type') === 'password') {
        $(thisField).attr('type', 'text');
        $(eye).removeClass('fa-eye-slash').addClass('fa-eye');
    }
    else {
        $(thisField).attr('type', 'password');
        $(eye).removeClass('fa-eye').addClass('fa-eye-slash');

    }
}

