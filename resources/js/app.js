import './bootstrap';
import '../css/app.css';
import 'gridstack/dist/gridstack.min.css';
import 'gridstack/dist/gridstack-all.js';
import { GridStack } from 'gridstack';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

Livewire.start();
window.GridStack = GridStack;

