<?php

function reais($value) {
	return "R$ " . number_format($value, 2, ',', '.');
}

