<?php
function post_notification ($notificationTitle, $notificationBody) {
echo
    '<script>
        var notificationTitle = "' . $notificationTitle . '";
        var notificationBody = "' . $notificationBody . '";

        if (window.Notification && Notification.permission !== "denied") {
            Notification.requestPermission((status) => {
            // status is "granted", if accepted by user
                var n = new Notification(notificationTitle, {
                    body: notificationBody
                });
            })
        }
    </script>';
}
?>