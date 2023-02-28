<script>
    // Get Cookie for ARIS Session Token
    const getCookie = (name) => {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    };

    // Set Cookie for ARIS Session Token
    const setCookie = (name, value) => {
        document.cookie = `${name}=${value}; path=/`;
    };

    // Fetch ARIS Token from API
    const fetchToken = async () => {
        const token = getCookie('ARIS_TOKEN');
        if (token) {
            // Token already exists in cookie
            console.log('Token already exists in cookie:', token)
            return;
        }

        // Token does not exist in cookie, fetch from API
        try {
            const username = 'system';
            const password = 'manager';
            const response = await fetch('http://27.112.79.138/umc/api/v1/tokens', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'tenant=default&name=' + username + '&password=' + password
            });

            if (response.ok) {
                const data = await response.json();
                console.log('Response data:', data);
                const access_token = data.token;
                if (access_token) {
                    setCookie('ARIS_TOKEN', access_token);
                    console.log('Token saved to cookie:', access_token);
                } else {
                    console.error('Failed to fetch token: token not found in response');
                }
            } else {
                console.error('Failed to fetch token:', response.statusText);
            }
        } catch (error) {
            console.error('Failed to fetch token:', error);
        }
    };

    const fetchDatabase = async () => {
        const token = getCookie('ARIS_TOKEN');
        if (!token) {
            console.error('Token not found in cookie. Please fetch a token first.');
            return;
        }
        try {
            const response = await fetch(`http://27.112.79.138/abs/api/databases?umcsession=${token}`);
            if (response.ok) {
                const data = await response.json();
                console.log('Database data:', data);
                // TODO: Do something with the database data
            } else {
                console.error('Failed to fetch database:', response.statusText);
            }
        } catch (error) {
            console.error('Failed to fetch database:', error);
        }
    };

    const fetchGroup = async () => {
        const token = getCookie('ARIS_TOKEN');
        if (!token) {
            console.log('Token not found in cookie');
            return;
        }
        const parent = document.getElementById('parent_group').value;
        const input = document.getElementById('input_group').value;
        const url = `http://27.112.79.138/abs/api/groups/Database Research Aris?parent=${encodeURIComponent(parent)}&umcsession=${token}`;
        const data = {
            kind: 'GROUP',
            attributes: [{
                kind: 'ATTRIBUTE',
                typename: 'Name',
                apiname: 'AT_NAME',
                language: 'en_US',
                value: input
            }]
        };
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // cors
                    "Access-Control-Allow-Origin": '*'
                },
                body: JSON.stringify(data)
            });
            if (response.ok) {
                const responseData = await response.json();
                console.log('Response data:', responseData);
                // Do something with the response data
            } else {
                console.error('Failed to create group:', response.statusText);
            }
        } catch (error) {
            console.error('Failed to create group:', error);
        }
    };

    const inputGroupButton = document.getElementById('input_data_group');
    inputGroupButton.addEventListener('click', fetchGroup);

    // Get token button event listener
    const getTokenButton = document.getElementById('gettoken');
    getTokenButton.addEventListener('click', fetchToken);

    // Destroy token button event listener
    const destroyTokenButton = document.getElementById('destroytoken');
    destroyTokenButton.addEventListener('click', () => {
        setCookie('ARIS_TOKEN', '', -1);
        console.log('Token removed from cookie');
    });

    // Get database button event listener
    const viewDatabaseButton = document.getElementById('view_database');
    viewDatabaseButton.addEventListener('click', fetchDatabase);
</script>
</body>

</html>