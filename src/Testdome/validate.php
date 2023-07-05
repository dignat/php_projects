<?php

function validate(string $username): bool
{
    return strlen($username) >= 5 && preg_match('/^[A-Za-z0-9]+(_[A-Za-z0-9]+)?$/', $username) === 1;
}

echo validate('Mike_Standish') ? 'Valid' : 'Invalid'; #Valid username
echo "\n";
echo validate('Mike Standish') ? 'Valid' : 'Invalid'; #Invalid username