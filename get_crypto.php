<?php
if (isset($_POST['crypto'])) {
    $crypto = $_POST['crypto'];

    // Si se solicita RubiCoin, devolvemos datos simulados
    if ($crypto === 'rubicoin') {
        $fakeData = [
            'id' => 'rubicoins',
            'symbol' => 'rubi',
            'name' => 'RubiCoin',
            'market_data' => [
                'current_price' => [
                    'usd' => 50000, // Precio ficticio
                ],
                'price_change_percentage_24h' => 2.5 // Variación ficticia
            ]
        ];
        echo json_encode($fakeData);
        exit; // Terminar el script aquí
    }

    // Hacer la solicitud a la API de CoinGecko para otras criptomonedas
    $apiUrl = "https://api.coingecko.com/api/v3/coins/{$crypto}";
    
    // Obtener la respuesta de la API
    $cryptoData = file_get_contents($apiUrl);
    
    // Comprobar si hay un error en la solicitud
    if ($cryptoData === FALSE) {
        echo json_encode(['error' => 'Error al obtener datos.']);
    } else {
        // Devolver los datos al frontend
        echo $cryptoData;
    }
}
?>
