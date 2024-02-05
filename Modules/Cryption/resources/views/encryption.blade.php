<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption and Decryption</title>
</head>

<body>
    <h1>Encryption/Decryption Example</h1>
    <form method="POST" action="{{ route('encrypt') }}">
        @csrf
        <label for="data">Data to Encrypt:</label>
        <input type="text" name="data" required>
        <button type="submit">Encrypt</button>
    </form>

    <br>

    <form method="POST" action="{{ route('decrypt') }}">
        @csrf
        <label for="encrypted_data">Data to Decrypt:</label>
        <input type="text" name="encrypted_data" required>
        <button type="submit">Decrypt</button>
    </form>

    @isset($encryptedResult)
        <p><strong>Encrypted Result:</strong> {{ $encryptedResult }}</p>
    @endisset

    @isset($decryptedResult)
        <p><strong>Decrypted Result:</strong> {{ $decryptedResult }}</p>
    @endisset

</body>

</html>