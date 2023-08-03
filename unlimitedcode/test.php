<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Template</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }
        #canvas-container {
            width: 100vw;
            height: 100vh;
            overflow: auto;
        }
        canvas {
            display: block;
            margin: auto;
        }
    </style>
       
        
</head>

<body>
    <div id="canvas-container">
        <canvas id="myCanvas"></canvas>
        <button id="downloadButton">Download PDF</button>
    </div>
   
 <!-- Add the jsPDF library -->
 <!-- Use a different version of jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- Add the html2canvas library -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>









        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('myCanvas');
            canvas.width = window.innerWidth - 200;
            canvas.height = window.innerHeight;

            const ctx = canvas.getContext('2d');

            function drawBackground() {
                const backgroundImage = new Image();
            backgroundImage.src = 'assets/image/62c6bda982f7cadd3db10301_B4-p-500.jpg';
            backgroundImage.onload = function () {
                ctx.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);
                drawOverlay();
            };
            }
            function drawOverlay() {
            ctx.fillStyle = 'rgba(0, 0, 0, 0)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            drawContent();
        }

        function drawContent() {
            ctx.font = 'bold 48px Italiana';
            ctx.fillStyle = 'black';
            ctx.textAlign = 'center';

            // Draw title
            ctx.fillText('Biodata', canvas.width / 2, 100);

            // Draw profile image
            const profileImage = new Image();
            profileImage.src = 'assets/image/images (3).jpg';
            profileImage.onload = function () {
                const imageWidth = 200;
                const imageHeight = 200;
                const imageX = (canvas.width - imageWidth) / 2;
                const imageY = 200;
                const borderRadius = imageWidth / 2; // Calculate the border radius
                // Draw the profile image with border radius
                ctx.save();
                ctx.beginPath();
                ctx.arc(
                    imageX + borderRadius,
                    imageY + borderRadius,
                    borderRadius,
                    0,
                    Math.PI * 2
                );
                ctx.closePath();
                ctx.clip();
                ctx.drawImage(profileImage, imageX, imageY, imageWidth, imageHeight);
                ctx.strokeStyle = 'orange'; // Set the border color to orange
                ctx.lineWidth = 10; // Set the border width to 5px
                ctx.stroke();
                ctx.restore();
                drawProfileName();
            };

            function drawProfileName() {
                ctx.font = 'bold 36px Italiana';
                ctx.fillStyle = 'black';

                const profileName = 'Rohan Gaur';
                const nameY = 450;

                ctx.fillText(profileName, canvas.width / 2, nameY);
                drawContentRows();
            }

            function drawContentRows() {
                ctx.font = '20px  serif';
                ctx.fillStyle = 'rgb(139, 122, 6)';
                ctx.textAlign = 'left';

                const contentRows = [
                    'Date of Birth : 01/01/1991',
                    'Time of Birth : 02:01:04 PM',
                    'Place of Birth: New Delhi',
                    'Rashi: Taurus (Vrushabh)',
                    'Nakshatra: Ardra',
                    'Height: 6 ft 06 in',
                    'Religion : Hindu',
                    'Caste : Rajput',
                    'Sub caste : Gaur',
                    'Gotra: Bharadwaj',
                    'Manglik: Yes',
                    'Education: Graduate / Post Graduate',
                    'College Name : IIT, Kanpur',
                    'Employed in: Private Sector',
                    'Organization name: Betterhalf Pvt. Ltd.',
                    'Annual Income : 25 - 50 Lakhs',
                ];

                const rowHeight = 10;
                let initialY = 550;
                const spacing = 20;

                contentRows.forEach((row) => {
                    ctx.fillText(row, canvas.width / 10, initialY);
                    initialY += rowHeight + spacing;
                });

                drawFamilyDetails();
            }

                                    function drawFamilyDetails() {
                        ctx.font = 'bold 24px serif';
                        ctx.fillStyle = 'rgb(139, 122, 6)';
                        ctx.textAlign = 'left';

                        const familyTitle = 'Family Details';
                        const familyTitleY = 600;
                        const column2X = canvas.width / 2;

                        ctx.font = 'bold 30px serif'; // Update font size and style for the family details heading
                        ctx.fillText(familyTitle, column2X, familyTitleY);

                        const familyDetails = [
                            "Father's Name: Vikas Gaur",
                            "Father's Occupation: Private Sector",
                            "Mother's Name: Devi Gaur",
                            "Mother's Occupation: Private Sector",
                            'Total Brothers: 1',
                            'Total Sisters: 1',
                            'Married Brothers: 0',
                            'Married Sisters: 0',
                        ];

                        let familyDetailsY = 650;
                        const rowHeight = 10;
                        const spacing = 20;

                        ctx.font = '20px Arial'; // Update font size for the family details
                        familyDetails.forEach((detail) => {
                            ctx.fillText(detail, column2X, familyDetailsY);
                            familyDetailsY += rowHeight + spacing;
                        });

                        drawContactDetails();
                        }


 
                            function drawContactDetails() {
                ctx.font = 'bold 24px serif';
                ctx.fillStyle = 'rgb(139, 122, 6)';
                ctx.textAlign = 'left';

                const contactTitle = 'Contact Details';
                const contactTitleY = 950;
                const column2X = canvas.width / 2;

                ctx.font = 'bold 30px serif'; // Update font size and style for the contact details heading
                ctx.fillText(contactTitle, column2X, contactTitleY);

                const contactDetails = [
                    'Contact Number: 987654xxxx',
                    'Address: Bangalore, Karnataka',
                ];

                let contactDetailsY = 1000;
                const rowHeight = 10;
                const spacing = 20;

                ctx.font = '20px serif'; // Update font size for the contact details
                contactDetails.forEach((detail) => {
                    ctx.fillText(detail, column2X, contactDetailsY);
                    contactDetailsY += rowHeight + spacing;
                });

                drawButton();
                }


                                    function drawButton() {
                    const buttonX = canvas.width / 2 - 140;
                    const buttonY = 1600;
                    const buttonWidth = 280;
                    const buttonHeight = 60;

                    // Draw the button with outline
                    ctx.fillStyle = 'orange';
                    ctx.fillRect(buttonX, buttonY, buttonWidth, buttonHeight);

                    ctx.strokeStyle = 'orange';
                    ctx.lineWidth = 2;
                    ctx.strokeRect(buttonX, buttonY, buttonWidth, buttonHeight);

                    ctx.font = 'bold 24px serif';
                    ctx.fillStyle = 'black';
                    ctx.textAlign = 'center';

                    ctx.fillText('Created by BetterHalf', canvas.width / 2, 1640);
                    }

                    // Add event listener for button hover effect
                    canvas.addEventListener('mousemove', handleButtonHover);

                    function handleButtonHover(event) {
                    const rect = canvas.getBoundingClientRect();
                    const mouseX = event.clientX - rect.left;
                    const mouseY = event.clientY - rect.top;

                    const buttonX = canvas.width / 2 - 140;
                    const buttonY = 1600;
                    const buttonWidth = 280;
                    const buttonHeight = 60;

                    if (
                        mouseX >= buttonX &&
                        mouseX <= buttonX + buttonWidth &&
                        mouseY >= buttonY &&
                        mouseY <= buttonY + buttonHeight
                    ) {
                        // Change button background and color on hover
                        ctx.fillStyle = 'white';
                        ctx.fillRect(buttonX, buttonY, buttonWidth, buttonHeight);

                        ctx.font = 'bold 24px serif';
                        ctx.fillStyle = 'orange';
                        ctx.textAlign = 'center';

                        ctx.fillText('Created by BetterHalf', canvas.width / 2, 1640);
                    } else {
                        // Reset button appearance when not hovered
                        ctx.fillStyle = 'orange';
                        ctx.fillRect(buttonX, buttonY, buttonWidth, buttonHeight);

                        ctx.strokeStyle = 'rgb(241, 195, 109)';
                        ctx.lineWidth = 2;
                        ctx.strokeRect(buttonX, buttonY, buttonWidth, buttonHeight);

                        ctx.font = 'bold 24px serif';
                        ctx.fillStyle = 'black';
                        ctx.textAlign = 'center';

                        ctx.fillText('Created by BetterHalf', canvas.width / 2, 1640);
                    }
                    }


            // Adjust canvas size and redraw content if necessary
            const contentHeight = 1740; // Calculate the total height of the content
            if (contentHeight > canvas.height) {
                canvas.height = contentHeight + 50; // Increase canvas height to fit the content
                drawBackground(); // Redraw the background and content with updated canvas height
            }
        }
            // ... Rest of your drawing functions ...

            // Draw the template
            drawBackground();


         

            const downloadButton = document.getElementById('downloadButton');
            downloadButton.addEventListener('click', function () {
                downloadPDF();
            });

            function downloadPDF() {
                // Calculate the total height and width of the canvas content
                const contentHeight = canvas.height;
                const contentWidth = canvas.width;

                // Set the height and width of each capture segment (adjust these values as needed)
                const segmentHeight = 2000;
                const segmentWidth = 1200;

                // Calculate the number of segments required to capture the full content both vertically and horizontally
                const numSegmentsVertical = Math.ceil(contentHeight / segmentHeight);
                const numSegmentsHorizontal = Math.ceil(contentWidth / segmentWidth);

                // Initialize the variable to store the captured image data URLs
                let imageDataUrls = [];

                // Recursive function to capture canvas content in segments
                function captureSegment(startY, startX, segmentIndexY, segmentIndexX) {
                    const endY = Math.min(startY + segmentHeight, canvas.height);
                    const endX = Math.min(startX + segmentWidth, canvas.width);

                    // Capture the content of the current segment using html2canvas
                    html2canvas(canvas, {
                        y: startY,
                        x: startX,
                        height: endY - startY,
                        width: endX - startX
                    }).then(function (canvasSegment) {
                        // Convert the captured canvas content to an image data URL
                        const imageData = canvasSegment.toDataURL('image/jpeg', 1.0);

                        // Push the image data URL to the array
                        imageDataUrls.push(imageData);

                        if (segmentIndexY === numSegmentsVertical - 1 && segmentIndexX === numSegmentsHorizontal - 1) {
                            // If all segments are captured, proceed to create the PDF
                            createPDF();
                        } else {
                            // Capture the next segment
                            if (segmentIndexX === numSegmentsHorizontal - 1) {
                                captureSegment(endY, 0, segmentIndexY + 1, 0);
                            } else {
                                captureSegment(startY, endX, segmentIndexY, segmentIndexX + 1);
                            }
                        }
                    }).catch(function (error) {
                        console.error('Error capturing the canvas content:', error);
                    });
                }

                // Function to create the PDF and save it
                function createPDF() {
                    // Create a new jsPDF instance
                    const pdf = new jsPDF({
                        orientation: 'p',
                        unit: 'px',
                        format: [contentWidth, contentHeight] // Use the full content width and height for the PDF
                    });

                    // Add each captured segment as an image to the PDF document
                    let currentY = 0;
                    for (let i = 0; i < imageDataUrls.length; i++) {
                        if (i !== 0 && i % numSegmentsHorizontal === 0) {
                            pdf.addPage();
                            currentY = 0;
                        }
                        pdf.addImage(imageDataUrls[i], 'JPEG', 0, currentY);
                        currentY += segmentHeight;
                    }

                    // Save the PDF document with the name "canvas_template.pdf"
                    pdf.save('canvas_template.pdf');
                }

                // Start capturing segments from the top-left of the canvas
                captureSegment(0, 0, 0, 0);
            }
        });
    </script>
   

</body>

</html>