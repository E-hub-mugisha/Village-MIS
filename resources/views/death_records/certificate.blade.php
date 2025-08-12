<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Death Certificate</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin: 40px; }
        h1 { font-size: 32px; }
        p { font-size: 18px; margin-bottom: 10px; }
        .bordered { border: 2px solid black; padding: 30px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Death Certificate</h1>
    <div class="bordered">
        <p><strong>Certificate No:</strong> {{ $record->certificate_number }}</p>
        <p><strong>Full Name:</strong> {{ $record->full_name }}</p>
        <p><strong>Gender:</strong> {{ $record->gender }}</p>
        <p><strong>Age:</strong> {{ $record->age }}</p>
        <p><strong>Date of Death:</strong> {{ \Carbon\Carbon::parse($record->date_of_death)->format('F j, Y') }}</p>
        <p><strong>Cause of Death:</strong> {{ $record->cause_of_death }}</p>
        <p><strong>Place of Death:</strong> {{ $record->place_of_death }}</p>
        <p><strong>Village:</strong> {{ $record->village }}</p>
        <p><strong>Informant Name:</strong> {{ $record->informant_name }}</p>
        <p><strong>Registration Date:</strong> {{ \Carbon\Carbon::parse($record->registration_date)->format('F j, Y') }}</p>
    </div>
    <p style="margin-top: 50px;">Issued by: Village Registration Officer</p>
</body>
</html>
