<?php
class Calendar {
    private $year;
    private $month;
    private $events = [];

    public function __construct($year = null, $month = null) {
        $this->year = $year ?? date('Y');
        $this->month = $month ?? date('m');
    }

    public function add_event($text, $date, $color = 'event-green') {
        $this->events[] = ['text' => $text, 'date' => $date, 'color' => $color];
    }

    private function build_calendar() {
        $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $firstDayOfMonth = date('w', strtotime("$this->year-$this->month-01"));
        $numberOfDays = date('t', strtotime("$this->year-$this->month-01"));

        $html = '<div class="calendar">';
        $html .= '<div class="men">';
        $html .= '<button class="btn btn-sm btn-primary" onclick="navigateCalendar(-1)">Previous</button>';
        $html .= '<span class="mnth">' . date('F Y', strtotime("$this->year-$this->month-01")) . '</span>';
        $html .= '<button class="btn btn-sm btn-primary" onclick="navigateCalendar(1)">Next</button>';
        $html .= '</div>';
        $html .= '<div class="days">';
        
        // Days of the week headers
        foreach ($daysOfWeek as $day) {
            $html .= '<div class="day_name">' . $day . '</div>';
        }

        // Blank days before the first day of the month
        $currentDay = 1;
        $html .= str_repeat('<div class="day_num"></div>', $firstDayOfMonth);

        // Days with actual dates
        while ($currentDay <= $numberOfDays) {
            $dateString = sprintf('%s-%02d-%02d', $this->year, $this->month, $currentDay);
            $html .= '<div class="day_num">';
            $html .= '<span>' . $currentDay . '</span>';

            // Check if there are any events for this day
            foreach ($this->events as $event) {
                if ($event['date'] == $dateString) {
                    // Corrected line to use class properties $this->year, $this->month, and $currentDay
                    $html .= '<a href="view_bookings?year=' . $this->year . '&month=' . $this->month . '&id=' . $currentDay . '">
                                <div class="event ' . $event['color'] . '">' . $event['text'] . '</div>
                              </a>';
                }
            }

            $html .= '</div>';
            $currentDay++;
        }

        $html .= '</div></div>';
        return $html;
    }

    public function __toString() {
        return $this->build_calendar();
    }
}
?>
