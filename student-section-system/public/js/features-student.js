// Enhanced Student Management - Search & Filter Features
// File: public/js/student-features.js

class StudentManager {
    constructor() {
        this.students = [];
        this.filteredStudents = [];
        this.currentSort = { field: null, direction: 'asc' };
        this.init();
    }

    init() {
        this.setupSearchAndFilter();
        this.setupSorting();
        this.setupBulkActions();
        this.setupExportFeatures();
        this.collectStudentData();
        this.addEnhancedUI();
    }

    // --- UI Enhancements ---
    addEnhancedUI() {
        const container = document.querySelector('.container');
        if (!container) return;

        const title = container.querySelector('h1');
        if (title && !document.querySelector('.student-controls')) {
            const controlsHTML = `
                <div class="student-controls">
                    <div class="search-section">
                        <div class="search-box">
                            <input type="text" id="studentSearch" placeholder="🔍 Search students..." />
                            <button id="clearSearch" class="clear-btn">✕</button>
                        </div>
                        <select id="filterBy" class="filter-select">
                            <option value="all">All Students</option>
                            <option value="hasEmail">Has Email</option>
                            <option value="noEmail">No Email</option>
                            <option value="hasContact">Has Contact</option>
                            <option value="noContact">No Contact</option>
                        </select>
                    </div>
                    <div class="action-section">
                        <button id="bulkSelect" class="action-btn">Select All</button>
                        <button id="exportData" class="action-btn export-btn">📊 Export</button>
                        <div class="view-toggle">
                            <button id="gridView" class="view-btn active">⚏</button>
                            <button id="listView" class="view-btn">☰</button>
                        </div>
                    </div>
                </div>
                <div class="student-stats">
                    <div class="stat-card">
                        <span class="stat-number" id="totalStudents">0</span>
                        <span class="stat-label">Total Students</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number" id="studentsWithEmail">0</span>
                        <span class="stat-label">With Email</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number" id="studentsWithContact">0</span>
                        <span class="stat-label">With Contact</span>
                    </div>
                </div>
            `;
            title.insertAdjacentHTML('afterend', controlsHTML);
        }

        this.addSortingHeaders();
        this.addBulkSelectionCheckboxes();
    }

    addSortingHeaders() {
        const header = document.querySelector('.student-header');
        if (header) {
            const spans = header.querySelectorAll('span');
            spans.forEach((span, index) => {
                const field = ['studentNumber', 'name', 'email', 'contactNumber', 'actions'][index];
                if (field !== 'actions') {
                    span.innerHTML = `${span.textContent} <span class="sort-arrow" data-field="${field}">⟳</span>`;
                    span.style.cursor = 'pointer';
                }
            });
        }
    }

    addBulkSelectionCheckboxes() {
        const studentItems = document.querySelectorAll('ul li');
        studentItems.forEach((item, index) => {
            const studentInfo = item.querySelector('.student-info');
            if (studentInfo && !studentInfo.querySelector('.bulk-checkbox')) {
                const checkbox = document.createElement('div');
                checkbox.className = 'student-checkbox';
                checkbox.innerHTML = `<input type="checkbox" id="student-${index}" class="bulk-checkbox" />`;
                studentInfo.insertBefore(checkbox, studentInfo.firstChild);
                studentInfo.style.gridTemplateColumns = 'auto 1fr 2fr 2fr 1.5fr';
            }
        });
    }

    // --- Data Handling ---
    collectStudentData() {
        const studentItems = document.querySelectorAll('ul li');
        this.students = Array.from(studentItems).map((item, index) => {
            const spans = item.querySelectorAll('.student-info span');
            return {
                index,
                element: item,
                studentNumber: spans[0]?.textContent || '',
                name: spans[1]?.textContent || '',
                email: spans[2]?.textContent || '',
                contactNumber: spans[3]?.textContent || ''
            };
        });
        this.filteredStudents = [...this.students];
        this.updateStats();
    }

    updateStats() {
        document.getElementById('totalStudents').textContent = this.students.length;
        document.getElementById('studentsWithEmail').textContent = this.students.filter(s => s.email).length;
        document.getElementById('studentsWithContact').textContent = this.students.filter(s => s.contactNumber).length;
    }

    updateDisplay() {
        this.students.forEach(s => s.element.style.display = 'none');
        this.filteredStudents.forEach(s => s.element.style.display = '');
    }

    // --- Search & Filter ---
    setupSearchAndFilter() {
        const searchInput = document.querySelector('#studentSearch');
        const filterSelect = document.querySelector('#filterBy');
        const clearBtn = document.querySelector('#clearSearch');

        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.performSearch(e.target.value);
                }, 300);
            });
        }

        if (filterSelect) {
            filterSelect.addEventListener('change', (e) => {
                this.applyFilter(e.target.value);
            });
        }

        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                if (searchInput) searchInput.value = '';
                if (filterSelect) filterSelect.value = 'all';
                this.showAllStudents();
            });
        }
    }

    performSearch(query) {
        const searchTerm = query.toLowerCase().trim();

        if (!searchTerm) {
            this.showAllStudents();
            return;
        }

        this.filteredStudents = this.students.filter(student =>
            student.studentNumber.toLowerCase().includes(searchTerm) ||
            student.name.toLowerCase().includes(searchTerm) ||
            student.email.toLowerCase().includes(searchTerm) ||
            student.contactNumber.toLowerCase().includes(searchTerm)
        );

        this.updateDisplay();
        this.highlightSearchTerms(searchTerm);
    }

    applyFilter(filterType) {
        switch (filterType) {
            case 'hasEmail':
                this.filteredStudents = this.students.filter(s => s.email.trim() !== '');
                break;
            case 'noEmail':
                this.filteredStudents = this.students.filter(s => !s.email.trim());
                break;
            case 'hasContact':
                this.filteredStudents = this.students.filter(s => s.contactNumber.trim() !== '');
                break;
            case 'noContact':
                this.filteredStudents = this.students.filter(s => !s.contactNumber.trim());
                break;
            default:
                this.filteredStudents = [...this.students];
        }

        this.updateDisplay();
    }

    showAllStudents() {
        this.filteredStudents = [...this.students];
        this.updateDisplay();
    }

    highlightSearchTerms(searchTerm) {
        this.students.forEach(student => {
            const spans = student.element.querySelectorAll('.student-info span');
            spans.forEach(span => {
                span.innerHTML = span.textContent; // reset before highlighting
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                span.innerHTML = span.textContent.replace(regex, '<mark class="search-highlight">$1</mark>');
            });
        });
    }

    // --- Sorting ---
    setupSorting() {
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('sort-arrow')) {
                const field = e.target.dataset.field;
                this.sortStudents(field);
            }
        });
    }

    sortStudents(field) {
        const direction = this.currentSort.field === field && this.currentSort.direction === 'asc' ? 'desc' : 'asc';

        this.filteredStudents.sort((a, b) => {
            let aVal = a[field] || '';
            let bVal = b[field] || '';

            if (field === 'name') {
                aVal = aVal.toLowerCase();
                bVal = bVal.toLowerCase();
            }

            return direction === 'asc' ? aVal.localeCompare(bVal) : bVal.localeCompare(aVal);
        });

        this.currentSort = { field, direction };
        this.updateSortIndicators(field, direction);
        this.updateDisplay();
    }

    updateSortIndicators(activeField, direction) {
        document.querySelectorAll('.sort-arrow').forEach(arrow => {
            const field = arrow.dataset.field;
            if (field === activeField) {
                arrow.textContent = direction === 'asc' ? '↑' : '↓';
                arrow.classList.add('active');
            } else {
                arrow.textContent = '⟳';
                arrow.classList.remove('active');
            }
        });
    }

    // --- Bulk Actions (stub) ---
    setupBulkActions() {
        const bulkBtn = document.querySelector('#bulkSelect');
        if (bulkBtn) {
            bulkBtn.addEventListener('click', () => {
                document.querySelectorAll('.bulk-checkbox').forEach(cb => cb.checked = true);
            });
        }
    }

    // --- Export Feature (stub) ---
    setupExportFeatures() {
        const exportBtn = document.querySelector('#exportData');
        if (exportBtn) {
            exportBtn.addEventListener('click', () => {
                const data = this.filteredStudents.map(s => ({
                    studentNumber: s.studentNumber,
                    name: s.name,
                    email: s.email,
                    contactNumber: s.contactNumber
                }));
                console.log("Export Data:", JSON.stringify(data, null, 2));
                alert("Export feature is not fully implemented yet. Check console for output.");
            });
        }
    }
}

document.addEventListener('DOMContentLoaded', () => new StudentManager());
