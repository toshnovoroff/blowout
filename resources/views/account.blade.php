<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/account.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>

<body id="body">
    <!-- <div id="bigServiceModal" class="service-big-modal">
        <div id="monirServiceModal" class="service-main-modal">
            <div class="service-main-modal-text">
                <div class="service-modal-top-text">
                    <h2 class="service-heading-text">Brow lamination with Botox</h2>
                    <p id="serviceCloseBtn" class="service-close-button">X</p>
                </div>
                <p class="service-modal-text">- nail shaping with disposable nail file;<br>
                    - cuticle treatment method of choice: classic, European;<br>
                    - foot treatment with apparatus;<br>
                    - base: standard or strengthening;<br>
                    - nail polish coating;<br>
                    - massage with cream;<br>
                    - cuticle oil</p>
                <div class="service-modal-bottom-text">
                    <p>Duration -> 80 minutes</p>
                    <p>Price -> 90$</p>
                </div>
            </div>
        </div>
    </div> -->
    <div id="bigEditModal" class="edit-page-modal-cont">
        <div id="minorEditModal" class="edit-page-modal-low">
            <div class="modal-top-text">
                <h2>Edit profile</h2>
                <p id="editCloseBtn" class="edit-close-modal-link">X</p>
            </div>
            <form id="editForm" class="modal-form" action="{{ route('updateAccount') }}" method="POST">
                @csrf
                <input class="modal-input" type="text" id="fName" name="fName" placeholder="First name" value="{{ $user->firstName }}">
                <input class="modal-input" type="text" id="sName" name="sName" placeholder="Second name" value="{{ $user->lastName }}">
                <input class="modal-input" type="email" id="eMail" name="eMail" placeholder="Email" value="{{ $user->email }}">
                <div class="bdatemodule">
                    <input class="modal-input" type="text" id="bDate" name="bDate" placeholder="Date of birth" value="{{ $user->birthDate }}">
                </div>
                <input class="modal-input-btn" onclick="refreshPage()" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <header>
        <nav class="burger-nav">
            <div class="burger-nav-top">
                <h1 class="nav-heading"><a href="{{ route('index') }}">BLOWOUT</a></h1>
                <svg id="burgerBtn" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
                </svg>
            </div>
            <div id="burgerNavList" class="burger-nav-bottom">
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('loyalty') }}">Loyalty</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('reviews') }}">Reviews</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('account') }}">Account</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('booking') }}">Booking</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav>
            <h1 class="nav-heading"><a href="{{ route('index') }}">BLOWOUT</a></h1>
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('loyalty') }}">Loyalty</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('reviews') }}">Reviews</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('account') }}">Account</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('booking') }}">Booking</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="account-wrapper">
        <div class="top-account-container">
            <div class="account-text-box">
                <div class="account-text-top">
                    <h2>{{ $user->firstName }} {{ $user->lastName }}</h2>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="account-exit-link">Exit</button>
                    </form>
                </div>
                <p>{{ $user->email }}</p>
                <div class="account-data">
                    <p>{{ $user->sex }}</p>
                    <p>{{ $user->birthDate }}</p>
                    <p>{{ $user->visitCount }} visits</p>
                    <p>{{ $user->visitCount }} points</p>
                </div>
                <div class="account-text-bottom">
                    <form action="booking.html">
                        <button type="submit" class="account-visit-btn">Book a visit</button>
                    </form>
                    <span id="editOpenBtn" class="account-edit-link">Edit</span>
                </div>
            </div>
        </div>
        @auth
        @if (auth()->user()->isAdmin)
        <div class="bottom-account-container">
            <h2>Database</h2>
            <table>
                <!-- <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td contenteditable="true" onBlur="updateCategory({{ $category->id }}, this.innerText)">{{ $category->name }}</td>
                        <td>
                            <button onclick="deleteCategory({{ $category->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody> -->
            </table>
        </div>
        @endif
        @endauth
        @auth
        @if (auth()->user()->isAdmin)
        <div class="bottom-account-container">
            <h2>Queries</h2>
            <div class="querry-container">
                <p>Information about clients who visit the beauty salon more than a specified number of times.</p>
                <label for="visitCount">Visit count:</label>
                <input type="number" id="visitCount" name="visitCount">
                <button id="filterButton">Show users</button>
            </div>
            <div id="resultContainer"></div>
            <script>
                document.getElementById('filterButton').addEventListener('click', function() {
                    const visitCount = document.getElementById('visitCount').value;
                    fetch(`/account/users-by-visit-count/${visitCount}`)
                        .then(response => response.json())
                        .then(data => {
                            // Очистить предыдущие данные
                            const resultContainer = document.getElementById('resultContainer');
                            resultContainer.innerHTML = '';

                            // Создать таблицу для отображения данных
                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            // Создать заголовки таблицы
                            const headers = ['ID', 'First Name', 'Last Name', 'Email', 'Visit Count'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            // Добавить данные о клиентах в таблицу
                            data.forEach(user => {
                                const row = document.createElement('tr');
                                const {
                                    id,
                                    firstName,
                                    lastName,
                                    email,
                                    visitCount
                                } = user;
                                const rowData = [id, firstName, lastName, email, visitCount];
                                rowData.forEach(text => {
                                    const cell = document.createElement('td');
                                    cell.textContent = text;
                                    row.appendChild(cell);
                                });
                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>
            <div class="querry-container">
                <p>List of cosmetics products that are in stock and available for sale.</p>
                <button id="filterButtonProducts">Show products</button>
            </div>
            <div id="resultContainerProducts"></div>

            <script>
                document.getElementById('filterButtonProducts').addEventListener('click', function() {
                    fetch('/account/available-products')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('resultContainerProducts');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['ID', 'Name', 'Subheading', 'Category', 'Description', 'Application', 'Composition', 'Application Area', 'Purpose', 'Target Audience', 'Price'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(product => {
                                const row = document.createElement('tr');
                                const {
                                    id,
                                    name,
                                    subheading,
                                    category,
                                    description,
                                    application,
                                    composition,
                                    applicationArea,
                                    purpose,
                                    targetAudience,
                                    price
                                } = product;
                                const rowData = [id, name, subheading, category, description, application, composition, applicationArea, purpose, targetAudience, price];
                                rowData.forEach(text => {
                                    const cell = document.createElement('td');
                                    cell.textContent = text;
                                    row.appendChild(cell);
                                });
                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>

            <div class="querry-container">
                <p>Most Popular Services</p>
                <button id="popularServicesButton">Show Services</button>
            </div>
            <div id="popularServicesResultContainer"></div>

            <script>
                document.getElementById('popularServicesButton').addEventListener('click', function() {
                    fetch('/account/popular-services')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('popularServicesResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['Service', 'Count'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(service => {
                                const row = document.createElement('tr');
                                const serviceName = service.name;
                                const serviceCount = service.count;

                                const serviceNameCell = document.createElement('td');
                                serviceNameCell.textContent = serviceName;
                                row.appendChild(serviceNameCell);

                                const serviceCountCell = document.createElement('td');
                                serviceCountCell.textContent = serviceCount;
                                row.appendChild(serviceCountCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script> //добавить временной период
            <div class="querry-container">
                <p>Total Revenue</p>
                <button id="totalRevenueButton">Show Total Revenue</button>
            </div>
            <div id="totalRevenueResultContainer"></div>

            <script>
                document.getElementById('totalRevenueButton').addEventListener('click', function() {
                    fetch('/account/total-revenue')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('totalRevenueResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['Service', 'Total'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.services.forEach(service => {
                                const row = document.createElement('tr');
                                const serviceName = service.name;
                                const serviceTotal = service.total;

                                const serviceNameCell = document.createElement('td');
                                serviceNameCell.textContent = serviceName;
                                row.appendChild(serviceNameCell);

                                const serviceTotalCell = document.createElement('td');
                                serviceTotalCell.textContent = serviceTotal;
                                row.appendChild(serviceTotalCell);

                                tbody.appendChild(row);
                            });

                            data.products.forEach(product => {
                                const row = document.createElement('tr');
                                const productName = product.name;
                                const productTotal = product.total;

                                const productNameCell = document.createElement('td');
                                productNameCell.textContent = productName;
                                row.appendChild(productNameCell);

                                const productTotalCell = document.createElement('td');
                                productTotalCell.textContent = productTotal;
                                row.appendChild(productTotalCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script> //добавить временной период
            <div class="querry-container">
                <p>Employees with Service Count</p>
                <button id="employeesButton">Show Employees</button>
            </div>
            <div id="employeesResultContainer"></div>

            <script>
                document.getElementById('employeesButton').addEventListener('click', function() {
                    fetch('/account/employees-with-service-count')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('employeesResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['First Name', 'Last Name', 'Service Count'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(employee => {
                                const row = document.createElement('tr');
                                const firstName = employee.firstName;
                                const lastName = employee.lastName;
                                const serviceCount = employee.serviceCount;

                                const firstNameCell = document.createElement('td');
                                firstNameCell.textContent = firstName;
                                row.appendChild(firstNameCell);

                                const lastNameCell = document.createElement('td');
                                lastNameCell.textContent = lastName;
                                row.appendChild(lastNameCell);

                                const serviceCountCell = document.createElement('td');
                                serviceCountCell.textContent = serviceCount;
                                row.appendChild(serviceCountCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>
            <div class="querry-container">
                <p>Customers with Contact Info</p>
                <button id="customersWithContactButton">Show Customers</button>
            </div>
            <div id="customersWithContactResultContainer"></div>

            <script>
                document.getElementById('customersWithContactButton').addEventListener('click', function() {
                    fetch('/account/customers-with-contact-info')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('customersWithContactResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['First Name', 'Last Name', 'Sex', 'Email', 'Birth Date'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(customer => {
                                const row = document.createElement('tr');
                                const firstName = customer.firstName;
                                const lastName = customer.lastName;
                                const sex = customer.sex;
                                const email = customer.email;
                                const birthDate = customer.birthDate;

                                const firstNameCell = document.createElement('td');
                                firstNameCell.textContent = firstName;
                                row.appendChild(firstNameCell);

                                const lastNameCell = document.createElement('td');
                                lastNameCell.textContent = lastName;
                                row.appendChild(lastNameCell);

                                const sexCell = document.createElement('td');
                                sexCell.textContent = sex;
                                row.appendChild(sexCell);

                                const emailCell = document.createElement('td');
                                emailCell.textContent = email;
                                row.appendChild(emailCell);

                                const birthDateCell = document.createElement('td');
                                birthDateCell.textContent = birthDate;
                                row.appendChild(birthDateCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>
            <div class="querry-container">
                <p>All Services</p>
                <button id="allServicesButton">Show Services</button>
            </div>
            <div id="allServicesResultContainer"></div>

            <script>
                document.getElementById('allServicesButton').addEventListener('click', function() {
                    fetch('/account/services')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('allServicesResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['Name', 'Description', 'Duration', 'Price'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(service => {
                                const row = document.createElement('tr');
                                const name = service.name;
                                const description = service.description;
                                const duration = service.duration;
                                const price = service.price;

                                const nameCell = document.createElement('td');
                                nameCell.textContent = name;
                                row.appendChild(nameCell);

                                const descriptionCell = document.createElement('td');
                                descriptionCell.textContent = description;
                                row.appendChild(descriptionCell);

                                const durationCell = document.createElement('td');
                                durationCell.textContent = duration;
                                row.appendChild(durationCell);

                                const priceCell = document.createElement('td');
                                priceCell.textContent = price;
                                row.appendChild(priceCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>
            <div class="querry-container">
                <p>Masters and Services</p>
                <button id="mastersButton">Show Masters</button>
            </div>
            <div id="mastersResultContainer"></div>

            <script>
                document.getElementById('mastersButton').addEventListener('click', function() {
                    fetch('/account/masters')
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('mastersResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['First Name', 'Last Name', 'Education Records', 'Work Experience', 'Service'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(master => {
                                const row = document.createElement('tr');
                                const firstName = master.firstName;
                                const lastName = master.lastName;
                                const educationRecords = master.educationRecords;
                                const workExperience = master.workExperience;
                                const service = master.services.length > 0 ? master.services[0].name : '';

                                const firstNameCell = document.createElement('td');
                                firstNameCell.textContent = firstName;
                                row.appendChild(firstNameCell);

                                const lastNameCell = document.createElement('td');
                                lastNameCell.textContent = lastName;
                                row.appendChild(lastNameCell);

                                const educationRecordsCell = document.createElement('td');
                                educationRecordsCell.textContent = educationRecords;
                                row.appendChild(educationRecordsCell);

                                const workExperienceCell = document.createElement('td');
                                workExperienceCell.textContent = workExperience;
                                row.appendChild(workExperienceCell);

                                const serviceCell = document.createElement('td');
                                serviceCell.textContent = service;
                                row.appendChild(serviceCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script>
            <div class="querry-container">
                <p>Get Clients Booked on Date</p>
                <input type="date" id="bookingDateInput">
                <button id="getClientsButton">Get Clients</button>
            </div>
            <div id="clientsResultContainer"></div>

            <script>
                document.getElementById('getClientsButton').addEventListener('click', function() {
                    const selectedDate = document.getElementById('bookingDateInput').value;
                    fetch(`/account/clients?date=${selectedDate}`)
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('clientsResultContainer');
                            resultContainer.innerHTML = '';

                            const table = document.createElement('table');
                            const thead = document.createElement('thead');
                            const tbody = document.createElement('tbody');

                            const headers = ['Client Name', 'Service Booked'];
                            const headerRow = document.createElement('tr');
                            headers.forEach(headerText => {
                                const th = document.createElement('th');
                                th.textContent = headerText;
                                headerRow.appendChild(th);
                            });
                            thead.appendChild(headerRow);
                            table.appendChild(thead);

                            data.forEach(client => {
                                const row = document.createElement('tr');
                                const clientName = client.firstName + ' ' + client.lastName;
                                const serviceBooked = client.serviceName;

                                const clientNameCell = document.createElement('td');
                                clientNameCell.textContent = clientName;
                                row.appendChild(clientNameCell);

                                const serviceBookedCell = document.createElement('td');
                                serviceBookedCell.textContent = serviceBooked;
                                row.appendChild(serviceBookedCell);

                                tbody.appendChild(row);
                            });

                            table.appendChild(tbody);
                            resultContainer.appendChild(table);
                        });
                });
            </script> //не работает полноценно
            <div class="querry-container">
                <p>Get available time slots</p>
                <input type="date" id="bookingDateInput">
                <input type="text" id="serviceIdInput" placeholder="ID услуги">
                <button id="getTimeSlotsButton">Get slots</button>
            </div>
            <div id="timeSlotsResultContainer"></div>

            <script>
                document.getElementById('getTimeSlotsButton').addEventListener('click', function() {
                    const selectedDate = document.getElementById('bookingDateInput').value;
                    const selectedServiceId = document.getElementById('serviceIdInput').value;
                    fetch(`account/get-available-time-slots?date=${selectedDate}&service_id=${selectedServiceId}`)
                        .then(response => response.json())
                        .then(data => {
                            const resultContainer = document.getElementById('timeSlotsResultContainer');
                            resultContainer.innerHTML = '';

                            const slotsList = document.createElement('ul');
                            data.forEach(slot => {
                                const listItem = document.createElement('li');
                                listItem.textContent = slot;
                                slotsList.appendChild(listItem);
                            });

                            resultContainer.appendChild(slotsList);
                        });
                });
            </script>

        </div>
        @endif
        @endauth

        <div class="bottom-account-container">
            <h2>Visits</h2>
            <div class="visits">

            </div>
        </div>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/account.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
</body>

</html>