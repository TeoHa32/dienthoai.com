<?php
class IndexModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getCustomerStatistics($start_date = '', $end_date = '') {
        $sql = "SELECT 
                    c.id,
                    c.fullname,
                    c.email,
                    c.phone,
                    COUNT(b.id) as order_count,
                    SUM(b.total) as total_amount,
                    MAX(b.create_at) as last_order_date
                FROM customers c
                LEFT JOIN bills b ON c.id = b.customer_id
                WHERE 1=1";

        if (!empty($start_date)) {
            $sql .= " AND b.create_at >= '$start_date'";
        }
        if (!empty($end_date)) {
            $sql .= " AND b.create_at <= '$end_date'";
        }

        $sql .= " GROUP BY c.id, c.fullname, c.email, c.phone
                  ORDER BY total_amount DESC";

        return $this->db->query($sql)->fetchAll();
    }

    public function getCustomerOrderDetails($customer_id, $start_date = '', $end_date = '') {
        $sql = "SELECT 
                    b.id as bill_id,
                    b.create_at,
                    b.total,
                    b.status,
                    b.payment_method,
                    GROUP_CONCAT(p.name SEPARATOR ', ') as products
                FROM bills b
                LEFT JOIN bill_detail bd ON b.id = bd.bill_id
                LEFT JOIN products p ON bd.product_id = p.id
                WHERE b.customer_id = $customer_id";

        if (!empty($start_date)) {
            $sql .= " AND b.create_at >= '$start_date'";
        }
        if (!empty($end_date)) {
            $sql .= " AND b.create_at <= '$end_date'";
        }

        $sql .= " GROUP BY b.id, b.create_at, b.total, b.status, b.payment_method
                  ORDER BY b.create_at DESC";

        return $this->db->query($sql)->fetchAll();
    }

    public function getCustomerTotalSpent($customer_id, $start_date = '', $end_date = '') {
        $sql = "SELECT 
                    SUM(total) as total_spent,
                    COUNT(*) as total_orders,
                    AVG(total) as average_order_value
                FROM bills 
                WHERE customer_id = $customer_id";

        if (!empty($start_date)) {
            $sql .= " AND create_at >= '$start_date'";
        }
        if (!empty($end_date)) {
            $sql .= " AND create_at <= '$end_date'";
        }

        return $this->db->query($sql)->fetch();
    }

    public function getCustomerProductPreferences($customer_id) {
        $sql = "SELECT 
                    p.id,
                    p.name,
                    COUNT(bd.id) as times_ordered,
                    SUM(bd.quantity) as total_quantity
                FROM bill_detail bd
                JOIN bills b ON bd.bill_id = b.id
                JOIN products p ON bd.product_id = p.id
                WHERE b.customer_id = $customer_id
                GROUP BY p.id, p.name
                ORDER BY times_ordered DESC
                LIMIT 5";

        return $this->db->query($sql)->fetchAll();
    }
}