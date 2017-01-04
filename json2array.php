<?php

$arr = json_decode('{
        "name": "Free disk space on $1",
        "key_": "vfs.fs.size[/home/joe/,free]",
        "hostid": "30074",
        "type": 0,
        "value_type": 3,
        "interfaceid": "30084",
        "applications": [
            "609",
            "610"
        ],
        "delay": 30
    }',
    true);

print_array("\t", $arr);

function print_array($indent, $arr) {
	foreach ($arr as $key => $value) {
		if (is_array($value)) {
			echo "$indent'$key' => [\r\n";
			print_array($indent."\t", $value);
			echo "$indent],\r\n";
		}
		else {
			echo "$indent'$key' => '$value',\r\n";
		}
	}
}
