import "./bootstrap";
import jQuery from "jquery";

import Alpine from "alpinejs";

window.$ = jQuery;

window.Alpine = Alpine;

Alpine.start();

import { Calendar } from "@fullcalendar/core";
window.Calendar = Calendar;
