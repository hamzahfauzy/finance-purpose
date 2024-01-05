<?php

$conn = conn();
$db   = new Database($conn);

// get last ticket from this year
$year       = date('Y');
$month      = date('m');
$db->query  = "SELECT * FROM purposes WHERE created_at LIKE '%$year%' ORDER BY id DESC";
$lastTicket = $db->exec('single');
$recordNumber = "001";
$ticket     = "BMTz $month.";
if($lastTicket && $lastTicket->ticket)
{
  $explodeTicket = explode('.', $lastTicket->ticket);
  $lastRecord    = (int) end($explodeTicket);
  $recordNumber  = ($lastRecord < 10 ? "0" : ($lastRecord < 100 ? "00" : "")) . $recordNumber;
}

$_POST['purposes']['ticket'] = $ticket.$recordNumber;
