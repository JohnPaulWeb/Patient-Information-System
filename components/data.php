<?php
session_start();

function read_json($file)
{
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }
    $data = json_decode(file_get_contents($file), true);
    return $data ?? [];
}

function write_json($file, $data)
{
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}


function add_patient($user_id, $name, $age, $diagnosis, $contact_info)
{
    $patients = read_json('../JSON/patients.json');
    $new_patient = [
        'id' => count($patients) + 1,
        'user_id' => $user_id,
        'name' => $name,
        'age' => $age,
        'diagnosis' => $diagnosis,
        'contact_info' => $contact_info
    ];
    $patients[] = $new_patient;
    write_json('../JSON/patients.json', $patients);
}


function get_patients_by_user($user_id)
{
    $patients = read_json('../JSON/patients.json');
    return array_values(array_filter($patients, fn($p) => $p['user_id'] == $user_id));
}

function get_patient_by_id($id)
{
    $patients = read_json('../JSON/patients.json');
    foreach ($patients as $p) {
        if ($p['id'] == $id) return $p;
    }
    return null;
}

function update_patient($id, $user_id, $name, $age, $diagnosis, $contact_info)
{
    $patients = read_json('../JSON/patients.json');
    foreach ($patients as &$p) {
        if ($p['id'] == $id && $p['user_id'] == $user_id) {
            $p['name'] = $name;
            $p['age'] = $age;
            $p['diagnosis'] = $diagnosis;
            $p['contact_info'] = $contact_info;
        } 
    }
    write_json('../JSON/patients.json', $patients);
}

function delete_patient($id, $user_id)
{
    $patients = read_json('../JSON/patients.json');
    $patients = array_values(array_filter($patients, fn($p) => !($p['id'] == $id && $p['user_id'] == $user_id)));
    write_json('../JSON/patients.json', $patients);
}
