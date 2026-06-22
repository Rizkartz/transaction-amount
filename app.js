document.getElementById('expenseForm').addEventListener('submit' ,async function(event) {
    
    event.preventDefault();
    
    const formData = new FormData(this);
    formData.append(
    'type',
    document.getElementById('type').value
);

  formData.append(
    'amount',
    document.getElementById('amount').value
);

  formData.append(
    'category',
    document.getElementById('category').value
);

  formData.append(
    'description',
    document.getElementById('description').value
);

    const response = await fetch('api.php', {
        method: 'POST',
        body: formData
    });
    const data = await response.json();

    alert("Transaksi berhasil ditambahkan!");
    loadData();

    async function loadData() {

    const response = await fetch('api.php');
    const data = await response.json();

    const list =
        document.getElementById('transactionList');

    list.innerHTML = '';

    if (data.length === 0) {
        list.innerHTML =
          '<div class="text-center text-gray-500 mt-4"><p>Belum ada transaksi.</p></div>';
        return;
    }

    data.forEach(item => {

        const isExpense =
            item.transaction_type === 'expense';

        const textSymbol =
            isExpense ? '-' : '+';

        const textColor =
            isExpense ? 'text-red-500' : 'text-green-500';

        list.innerHTML += `
        <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg mb-2">
            <div>
                <p>${item.description}</p>
                <p>${item.transaction_date}</p>
            </div>
            <span class="${textColor}">
                ${textSymbol} Rp ${item.amount}
            </span>
        </div>
        `;
    });
}});