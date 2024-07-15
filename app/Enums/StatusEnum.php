<?php
namespace App\Enums;

class StatusEnum {
    const PENDING_AT_STAT = 1;
    const PENDING_AT_SUPERVISOR = 2;
    const PENDING_AT_IP_ADMIN = 3;
    const APPROVED_BY_SPHF = 5;
    const APPROVED_BY_SUPERVISOR = 9;
    const REJECTED_BY_SUPERVISOR = 6;
    const REJECTED_BY_IP_ADMIN = 7;
    const REJECTED_BY_SPHF = 8;
    const APPROVED_BY_IP_ADMIN = 10;

    public static function getStatusName($status) {
        $statuses = [
            self::PENDING_AT_STAT => 'Pending at STAT',
            self::PENDING_AT_SUPERVISOR => 'Pending at Supervisor',
            self::PENDING_AT_IP_ADMIN => 'Pending at IP Admin',
            self::APPROVED_BY_SPHF => 'Approved by SPHF',
            self::APPROVED_BY_SUPERVISOR => 'Approved by Supervisor',
            self::REJECTED_BY_SUPERVISOR => 'Rejected by Supervisor',
            self::REJECTED_BY_IP_ADMIN => 'Rejected by IP Admin',
            self::REJECTED_BY_SPHF => 'Rejected by SPHF',
            self::APPROVED_BY_IP_ADMIN => 'Approved by IP Admin'
        ];

        return $statuses[$status] ?? 'Unknown Status';
    }
}
