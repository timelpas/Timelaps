// gmail.js

const CLIENT_ID = '568494296882-uiqvb9e4osmtaib7cm12fou9lo88rcin.apps.googleusercontent.com';
const API_KEY = 'AIzaSyB9WOQOoqCWrTuqDMoxC-55ZOZrQi1Uqxo';
const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest';
const SCOPES = 'https://www.googleapis.com/auth/gmail.send';

let tokenClient;
let gapiInited = false;
let gisInited = false;

document.addEventListener('DOMContentLoaded', () => {
    const btnContact = document.getElementById('btnContact');
    const contactWrapper = document.getElementById('contactWrapper');
    const contactIconClose = document.querySelector('#contactWrapper .icon-close');
    const eslogan = document.getElementById('eslogan');

    btnContact.addEventListener('click', () => {
        contactWrapper.classList.add('active-popup');
        eslogan.classList.add('hidden');
    });

    contactIconClose.addEventListener('click', () => {
        contactWrapper.classList.remove('active-popup');
        eslogan.classList.remove('hidden');
    });

    document.getElementById('contactForm').addEventListener('submit', handleSubmit);

    // Espera a que la API de Google se cargue
    if (typeof gapi !== 'undefined') {
        gapi.load('client', initializeGapiClient);
    } else {
        console.error('gapi is not loaded');
    }
});

async function initializeGapiClient() {
    try {
        await gapi.client.init({
            apiKey: API_KEY,
            discoveryDocs: [DISCOVERY_DOC],
        });
        gapiInited = true;
        maybeInitializeGis();
    } catch (error) {
        console.error('Error initializing gapi client:', error);
    }
}

function maybeInitializeGis() {
    if (gapiInited) {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: '',
            ux_mode: 'redirect',
            callback: (response) => {
                if (response.error) {
                    console.error('Error obtaining access token:', response.error);
                } else {
                    sendEmail(response.access_token);
                }
            },
        });
        gisInited = true;
    }
}

async function handleSubmit(event) {
    event.preventDefault();
    console.log('Form submitted');
    if (gapiInited && gisInited) {
        tokenClient.requestAccessToken();
    } else {
        console.error('GAPI or GIS not initialized');
    }
}

async function sendEmail(accessToken) {
    console.log('Sending email...');

    const name = document.getElementById('contactName').value;
    const email = document.getElementById('contactEmail').value;
    const message = document.getElementById('contactMessage').value;

    console.log('Form values:', name, email, message);

    try {
        const emailMessage = `From: ${name} <${email}>\nTo: timelapsproyecto@gmail.com\nSubject: Contacto desde el sitio web\n\n${message}`;
        const encodedMessage = btoa(emailMessage).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');

        const res = await gapi.client.gmail.users.messages.send({
            userId: 'me',
            resource: {
                raw: encodedMessage,
            },
            headers: {
                Authorization: `Bearer ${accessToken}`,
            },
        });

        console.log('Email sent:', res.data);
        alert('Email sent successfully!');
        contactWrapper.classList.remove('active-popup');
        eslogan.classList.remove('hidden');
    } catch (error) {
        console.error('Error sending email:', error);
        alert('An error occurred while sending the email. Please try again later.');
    }
}
