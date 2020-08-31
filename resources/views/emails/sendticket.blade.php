<h1>Your Booking is Confirmed.</h1>
<div>
    <h3>your booking details</h3>
    <p>TicketId:{{ $request->tid }}</p>
    <p>Name:{{ $request->pname }}</p>
    <p>Email:{{ $request->email }}</p>
    <p>Date:{{ $request->date }}</p>
    <p>Source{{ $request->Source }}</p>
    <p>Destination:{{ $request->Destination }}</p>

    
</div>

<h3>Sent via @E-pass Portal</h3>