    document.addEventListener('DOMContentLoaded', function () {
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
        const eraserToggle = document.getElementById('eraserToggle');
        const eraserIcon = eraserToggle.querySelector('i');
        const penToolButton = document.getElementById('penTool');
        const imageToolButton = document.getElementById('imageTool');
        const imageUpload = document.getElementById('imageUpload');
        const imageUploadButton = document.getElementById('imageUploadButton');
        const textToolButton = document.getElementById('textTool');
        const zoomInButton = document.getElementById('zoomIn');
        const zoomOutButton = document.getElementById('zoomOut');
        const deleteToolButton = document.getElementById('deleteTool');
        const whiteboardContainer = document.getElementById('whiteboard-container');
        const productImages = document.querySelectorAll('.product-custom-img img');
        const saveButton = document.getElementById('saveButton');
        
        let selectedProductId;
        let strokeColor = colorPicker.value;
        let strokeWidth = strokeWidthInput.value;

        colorPicker.addEventListener('input', function () {
            const newColor = colorPicker.value;

            canvas.freeDrawingBrush.color = newColor;

            const activeObject = canvas.getActiveObject();

            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fill', newColor);
                canvas.renderAll();
            }
        });

        strokeWidthInput.addEventListener('input', function () {
            strokeWidth = strokeWidthInput.value;
            canvas.freeDrawingBrush.width = parseInt(strokeWidth, 10) || 1;
        });

        resetButton.addEventListener('click', function () {
            canvas.clear();
        });

        eraserToggle.addEventListener('click', function () {
            eraserCheckbox.checked = !eraserCheckbox.checked;

            const isChecked = eraserCheckbox.checked;
            const color = isChecked ? 'black' : 'white';

            eraserIcon.style.color = color;

            eraserToggle.style.backgroundColor = isChecked ? 'red' : '#007bff';
        });

        eraserCheckbox.addEventListener('change', function () {

            if (eraserCheckbox.checked) {
                canvas.isDrawingMode = true;
                canvas.freeDrawingBrush.color = '#ffffff';
            } else {
                canvas.isDrawingMode = false;
                canvas.freeDrawingBrush.color = strokeColor;
            }
        });

        imageUpload.addEventListener('mousedown', function (e) {
            e.preventDefault();
            imageUpload.click();
        });

        imageUpload.addEventListener('change', function () {
            handleImageUpload(this.files[0]);
        });

        imageUploadButton.addEventListener('click', function () {
            imageUpload.value = null;
            imageUpload.click();
        });

        penToolButton.addEventListener('click', function () {
            canvas.isDrawingMode = true;
            imageUpload.value = '';
        });

        imageToolButton.addEventListener('click', function () {
            canvas.isDrawingMode = false;
            eraserCheckbox.checked = false;
        });

        textToolButton.addEventListener('click', function () {
            canvas.isDrawingMode = false;
            eraserCheckbox.checked = false;
            addText();
        });

        zoomInButton.addEventListener('click', function () {
            zoom(1.1);
        });

        zoomOutButton.addEventListener('click', function () {
            zoom(0.9);
        });

        deleteToolButton.addEventListener('click', function () {
            const activeObject = canvas.getActiveObject();

            if (activeObject) {
                canvas.remove(activeObject);
            }
        });
        
        productImages.forEach(function (productImage) {
            productImage.addEventListener('click', function () {
                selectedProductId = productImage.parentElement.dataset.productId;
                const imageUrl = productImage.src;
                whiteboardContainer.style.background = `url(${imageUrl}) center / contain no-repeat`;
            });
        });

        function zoom(factor) {
            const container = document.getElementById('whiteboard-container');
            const currentTransform = container.style.transform || 'scale(1)';
            const newTransform = `scale(${parseFloat(currentTransform.match(/[\d\.]+/)[0]) * factor})`;
            container.style.transform = newTransform;
        }

        function handleImageUpload(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    fabric.Image.fromURL(event.target.result, function (img) {
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
        
        saveButton.addEventListener('click', function () {
            const dataURL = canvas.toDataURL();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            if (selectedProductId) {
                saveDesign(dataURL, csrfToken, selectedProductId);
            } else {
                console.error('No product selected.');
            }
        });

        function saveDesign(dataURL, csrfToken, selectedProductId) {
            const tempCanvas = document.createElement('canvas');
            const tempContext = tempCanvas.getContext('2d');

            tempCanvas.width = canvas.width * canvas.getZoom();
            tempCanvas.height = canvas.height * canvas.getZoom();

            tempContext.drawImage(canvas.lowerCanvasEl, 0, 0, tempCanvas.width, tempCanvas.height);

            const zoomedDataURL = tempCanvas.toDataURL();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/save-design', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onreadystatechange = function () {
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
                product_id: selectedProductId,
            };

            xhr.send(JSON.stringify(formData));
        }
    });
