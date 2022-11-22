export const LoginAuth = async (username, password, remember) => {
    try {
        const response = await axios.post('/login', {
            username,
            password,
            remember,
        });
        return await response.data;
    } catch (error) {
        if (error.response) {
            return { message: error.response.statusText, success: false };
        }
        return { message: 'Invalid username or password!', success: false };
    }
};
