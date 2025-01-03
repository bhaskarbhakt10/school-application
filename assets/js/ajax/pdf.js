import { JSPath, SimpleModal } from '../defaults/defaults.js';
/*
// If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url =  $(`#pdf`).data(`href`);
console.log(url, );
// Loaded via <script> tag, create shortcut to access PDF.js exports.
var { pdfjsLib } = globalThis;

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = `${JSPath()}assets/js/modules/pdf.worker.mjs`;

// Asynchronous download of PDF
var loadingTask = pdfjsLib.getDocument(url);
loadingTask.promise.then(function (pdf) {
    console.log('PDF loaded');

    // Fetch the first page
    var pageNumber = 1;
    pdf.getPage(pageNumber).then(function (page) {
        console.log('Page loaded');

        var scale = 1;
        var viewport = page.getViewport({ scale: scale });

        // Prepare canvas using PDF page dimensions
        var canvas = document.getElementById('the-canvas');
        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render PDF page into canvas context
        var renderContext = {
            canvasContext: context,
            viewport: viewport
        };
        var renderTask = page.render(renderContext);
        renderTask.promise.then(function () {
            console.log('Page rendered');
        });
    });
}, function (reason) {
    // PDF loading error
    console.error(reason);
});

*/


(function ($) {

    const Modal = SimpleModal(`pdf`, `Displaying PDF`,`modal-fullscreen`);

    $(document.body).on(`click`, `.pdf-link`, function (e) {

        e.preventDefault();

        const This = $(this);
        const frame = $(This).data(`frame`);
        const pdf = $(This).data(`href`);

        console.log(`${frame}=${pdf}`);
        const ModalID = `#${Modal}`;
        $(ModalID).modal('show');
        
        const ModalBody = $(ModalID).find(`.modal-body`);

        if(ModalBody.find(`iframe`).length > 0){
            ModalBody.find(`iframe`).remove();
        }

        ModalBody.append(` <iframe src="${frame}=${pdf}" width="100%" height="900" frameborder="0" />`)

    });

}(jQuery));