<!DOCTYPE html>
<html>
<head>
    <title>Birth Certificate</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            padding: 30px;
        }
        h1 {
            text-transform: uppercase;
            margin-bottom: 40px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        td {
            padding: 8px 15px;
            font-size: 14px;
            text-align: left;
        }
        .border {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <h1>Birth Certificate</h1>
    <table class="border">
        <tr><td><strong>Certificate No:</strong></td><td>{{ $record->certificate_number }}</td></tr>
        <tr><td><strong>Full Name:</strong></td><td>{{ $record->full_name }}</td></tr>
        <tr><td><strong>Gender:</strong></td><td>{{ ucfirst($record->gender) }}</td></tr>
        <tr><td><strong>Date of Birth:</strong></td><td>{{ $record->date_of_birth }}</td></tr>
        <tr><td><strong>Place of Birth:</strong></td><td>{{ $record->place_of_birth }}</td></tr>
        <tr><td><strong>Village:</strong></td><td>{{ $record->village }}</td></tr>
        <tr><td><strong>Father's Name:</strong></td><td>{{ $record->father_name }}</td></tr>
        <tr><td><strong>Mother's Name:</strong></td><td>{{ $record->mother_name }}</td></tr>
        <tr><td><strong>Informant:</strong></td><td>{{ $record->informant_name }}</td></tr>
        <tr><td><strong>Registered On:</strong></td><td>{{ $record->registration_date }}</td></tr>
    </table>
</body>
</html>
