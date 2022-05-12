<?php
var promise = $http({method: 'POST', url: 'ruta/al/script/bd.php', data: losDatos});

promise.success(function (data, status, headers, config, statusText) {
     //Este callback se realiza cuando la llamada ha sido un éxito
});

promise.error(function (data, status, headers, config, statusText) {
     //Este callback se realiza cuando la llamada ha tenido un error
});

?>