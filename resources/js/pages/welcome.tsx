export default function Welcome() {

    return (
        <button
          onClick={() => window.location.href = '/login'}
          className="w-full p-2 text-white transition bg-blue-500 rounded hover:bg-blue-600"
        >
          Entrar
        </button>
    );
}
