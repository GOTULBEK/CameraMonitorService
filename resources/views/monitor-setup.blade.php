<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Monitor Setup</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="monitor" id="selectedCamera">
        <img class="image-stream" src="" alt="Selected Camera Stream">
    </div>
    <div class="cameras">
        @foreach ($cameras as $camera)
            <div class="camera" data-camera-source="{{ $camera->video_source }}">
                <img class="camera-image" src="{{ $camera->video_source }}" alt="Camera Stream">
            </div>
        @endforeach
    </div>
</div>
<button id="saveMonitor">Save Monitor</button>
<!-- Need to reamake the script -->
<script>
    const selectedCameraElement = document.getElementById("selectedCamera");
    const cameraBoxes = document.querySelectorAll(".camera");

    cameraBoxes.forEach(cameraBox => {
        cameraBox.addEventListener("click", () => {
            const cameraSource = cameraBox.dataset.cameraSource;
            selectedCameraElement.querySelector(".image-stream").src = cameraSource;
        });
    });
    function allowDrop(event) {
        event.preventDefault();
    }

    function drag(event) {
        event.dataTransfer.setData("text/plain", event.target.dataset.cameraId);
    }

    function drop(event) {
        event.preventDefault();
        const cameraId = event.dataTransfer.getData("text/plain");
        const monitor = event.target;
        const camera = document.querySelector(`.camera[data-camera-id="${cameraId}"]`);
        monitor.appendChild(camera);
    }

    const saveMonitorButton = document.getElementById("saveMonitor");
    saveMonitorButton.addEventListener("click", function () {
        const monitorElement = document.querySelector(".monitor");
        const cameraElements = monitorElement.querySelectorAll(".camera");
        const cameraIds = Array.from(cameraElements).map(camera => camera.dataset.cameraId);

        const monitorName = prompt("Enter monitor name:");
        if (!monitorName) {
            return; // User canceled input
        }

        const roles = [];
        while (true) {
            const role = prompt("Enter a role for the monitor (or leave empty to finish):");
            if (role === "") {
                break; // Stop adding roles
            }
            roles.push(role);
        }

        fetch("/save-monitor", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                monitorName,
                roles,
                cameraIds,
            }),
        }).then(response => {
            if (response.ok) {
                alert("Monitor configuration saved successfully");
            } else {
                alert("Error saving monitor configuration");
            }
        });
    });
</script>
</body>
</html>
