@extends('layouts.main')
@section('content')
	<h1>Konfiguration</h1>
	<select name="companySelected" class="form-control">
		<option>Neues Logistik-Unternehmer anlegen</option>
	</select>

	<form action="/config" method="post" enctype="multipart/form-date"> {{ csrf_field() }}
		<div style="width: 400px; float: left"> 
			<h3 style="text-align: center">Firmen-Daten</h3>
			<label>Firmenname</label>
			<input type="text" name="nameCompany" required="true" class="form-control">
			<label>Inhaber</label>
			<input type="text" name="nameOwner" class="form-control">
			<label>Strasse & Hausnummer</label>
			<input type="text" name="street" class="form-control">
			<label>Postleitzahl & Stadt</label>
			<input type="text" name="city" class="form-control">
			<label>Land</label>
			<input type="text" name="country" class="form-control">
			<label>Telefon - Festnetz</label>
			<input type="text" name="phone" class="form-control">
			<label>Telefon - Mobil</label>
			<input type="text" name="cellphone" class="form-control">
			<label>Emailadresse</label>
			<input type="text" name="email" class="form-control">
			<label>Homepage</label>
			<input type="text" name="url" class="form-control">
			<label>Steuernummer</label>
			<input type="text" name="taxNumber" class="form-control">
			<label>Gerichtsstand</label>
			<input type="text" name="venue" class="form-control">
		</div>
		<div style="width: 400px;float: right">
			<h3 style="text-align: center">Bankverbindung</h3>
			<label>Bank</label>
			<input type="text" name="bank" class="form-control">
			<label>IBAN - Nummer</label>
			<input type="text" name="iban" class="form-control">
			<label>BIC - Nummer</label>
			<input type="text" name="bic" class="form-control"><br>
			<br><br><h3 style="text-align: center">Logo</h3>
			<input type="file" name="logo" >
		</div>
		<input type="submit" name="submit" value="Speichern" class="form-control">
	</form>
@endsection