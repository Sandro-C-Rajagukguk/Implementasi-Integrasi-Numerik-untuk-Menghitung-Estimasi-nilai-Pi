<?php
function f($x) {
    return 4 / (1 + $x * $x);
}

function simpson_integration($a, $b, $n) {
    if ($n % 2 != 0) {
        throw new Exception("N harus genap untuk metode Simpson 1/3.");
    }
    
    $h = ($b - $a) / $n;
    $integral = f($a) + f($b);
    
    for ($i = 1; $i < $n; $i++) {
        $x = $a + $i * $h;
        if ($i % 2 == 0) {
            $integral += 2 * f($x);
        } else {
            $integral += 4 * f($x);
        }
    }
    
    return $integral * $h / 3;
}

function rms_error($calculated_pi, $actual_pi) {
    return sqrt(($calculated_pi - $actual_pi) ** 2);
}

function test_simpson_integration($N_values) {
    $results = [];
    $actual_pi = 3.14159265358979323846;
    
    foreach ($N_values as $N) {
        $start_time = microtime(true);
        $calculated_pi = simpson_integration(0, 1, $N);
        $end_time = microtime(true);
        
        $rms = rms_error($calculated_pi, $actual_pi);
        $execution_time = $end_time - $start_time;
        
        $results[] = [
            'N' => $N,
            'calculated_pi' => $calculated_pi,
            'rms_error' => $rms,
            'execution_time' => $execution_time
        ];
    }
    
    return $results;
}

?>
