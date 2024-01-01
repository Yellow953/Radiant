@extends('layouts.app')

@section('content')

<style>
    #whiteboard-container {
        position: relative;
        border: 1px solid #ccc;
        border-radius: 25px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #whiteboard {
        cursor: crosshair;
        background: transparent;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h3 class="mb-3 mt-5">Whiteboard: </h3>
            <div id="zoom-container" style="width: 550px; height: 550px; overflow: auto;">
                <div id="whiteboard-container" class="d-flex justify-content-center"
                    style="background: url({{ asset('assets/images/white_hoodie_back.png')}}); background-position: center; background-size: contain; background-repeat: no-repeat;">
                    <canvas id="whiteboard" width="500" height="500"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="mb-3 mt-5">Controls: </h3>
            <div class="controls"
                style="height: 80%; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
                <input type="range" id="strokeWidth" min="1" max="20" value="5">

                <input type="color" id="colorPicker" value="#000000">

                <button id="resetButton" class="btn btn-primary">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <label class="btn btn-primary">
                    <input type="checkbox" id="eraserCheckbox">
                    <i class="fa-solid fa-eraser"></i>
                </label>

                <input type="file" id="imageUpload" accept="image/*">

                <button id="penTool" class="btn btn-primary">
                    <i class="fa-solid fa-pen"></i>
                </button>

                <button id="imageTool" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-pointer"></i>
                </button>

                <button id="textTool" class="btn btn-primary">
                    <i class="fa-solid fa-font"></i>
                </button>

                <button id="zoomIn" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </button>

                <button id="zoomOut" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass-minus"></i>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-md-end">
                <button id="saveButton" class="btn btn-primary">Save Design</button>
            </div>
        </div>
    </div>
</div>

<!-- Add this inside the script tag in your HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = new fabric.Canvas('whiteboard', {
            isDrawingMode: false,
            selection: false,
            state: [],
            currentStateIndex: -1, 
        });

        const colorPicker = document.getElementById('colorPicker');
        const strokeWidthInput = document.getElementById('strokeWidth');
        const resetButton = document.getElementById('resetButton');
        const eraserCheckbox = document.getElementById('eraserCheckbox');
        const imageUploadInput = document.getElementById('imageUpload');
        const penToolButton = document.getElementById('penTool');
        const imageToolButton = document.getElementById('imageTool');
        const textToolButton = document.getElementById('textTool');
        const zoomInButton = document.getElementById('zoomIn');
        const zoomOutButton = document.getElementById('zoomOut');

        let strokeColor = colorPicker.value;
        let strokeWidth = strokeWidthInput.value;

        colorPicker.addEventListener('input', function() {
            strokeColor = colorPicker.value;
            canvas.freeDrawingBrush.color = strokeColor;
        });

        strokeWidthInput.addEventListener('input', function() {
            strokeWidth = strokeWidthInput.value;
            canvas.freeDrawingBrush.width = parseInt(strokeWidth, 10) || 1;
        });

        resetButton.addEventListener('click', function() {
            canvas.clear();
        });

        eraserCheckbox.addEventListener('change', function() {
            if (eraserCheckbox.checked) {
                canvas.isDrawingMode = true;
                canvas.freeDrawingBrush.color = '#ffffff';
            } else {
                canvas.isDrawingMode = false;
                canvas.freeDrawingBrush.color = strokeColor;
            }
        });

        imageUploadInput.addEventListener('change', handleImageUpload);

        penToolButton.addEventListener('click', function() {
            canvas.isDrawingMode = true;
            imageUploadInput.value = '';
        });

        imageToolButton.addEventListener('click', function() {
            canvas.isDrawingMode = false;
            eraserCheckbox.checked = false;
        });

        textToolButton.addEventListener('click', function() {
            canvas.isDrawingMode = false;
            eraserCheckbox.checked = false;
            addText();
        });

        zoomInButton.addEventListener('click', function() {
            zoom(1.1);
        });

        zoomOutButton.addEventListener('click', function() {
            zoom(0.9); 
        });

        function zoom(factor) {
            const container = document.getElementById('whiteboard-container');
            const currentTransform = container.style.transform || 'scale(1)';
            const newTransform = `scale(${parseFloat(currentTransform.match(/[\d\.]+/)[0]) * factor})`;
            container.style.transform = newTransform;
        }

        function handleImageUpload(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    fabric.Image.fromURL(event.target.result, function(img) {
                        img.set({
                            left: canvas.width / 2 - img.width / 2,
                            top: canvas.height / 2 - img.height / 2,
                        });
                        canvas.add(img);
                    });
                };
                reader.readAsDataURL(file);
            }
        }

        function addText() {
            const text = new fabric.IText('Type here', {
                left: canvas.width / 2,
                top: canvas.height / 2,
                fill: strokeColor,
                fontSize: 20,
            });

            canvas.add(text);
            canvas.setActiveObject(text);
            text.enterEditing();
        }
    });
</script>

<!-- Add this inside the script tag in your HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('saveButton');
        const canvas = new fabric.Canvas('whiteboard');

        saveButton.addEventListener('click', function() {
            // Convert canvas to data URL
            const dataURL = canvas.toDataURL();

            // Get the CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send data to the server with the CSRF token
            saveDesign(dataURL, csrfToken);
        });

        function saveDesign(dataURL, csrfToken) {
            // Create a temporary canvas
            const tempCanvas = document.createElement('canvas');
            const tempContext = tempCanvas.getContext('2d');

            // Set the size of the temporary canvas based on the zoomed size
            tempCanvas.width = canvas.width * canvas.getZoom();
            tempCanvas.height = canvas.height * canvas.getZoom();

            // Draw the contents of the original canvas onto the temporary canvas with the applied zoom
            tempContext.drawImage(canvas.lowerCanvasEl, 0, 0, tempCanvas.width, tempCanvas.height);

            // Convert the temporary canvas to a data URL
            const zoomedDataURL = tempCanvas.toDataURL();

            // Send AJAX request to the server with the CSRF token and the zoomed data URL
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/save-design', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log('Design saved successfully!');
                    } else {
                        console.error('Failed to save design.');
                    }
                }
            };

            const formData = {
                design: zoomedDataURL,
            };

            xhr.send(JSON.stringify(formData));
        }
    });
</script>

@endsection