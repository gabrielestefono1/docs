import estilo from "./ContactMeBottom.module.scss";

interface ContactMeBottomProps {
    espaco?: boolean;
}

export default function ContactMeBottom({
    espaco = false,
}: Readonly<ContactMeBottomProps>) {
    return (
        <div className={estilo.bottom}>
            <button className={espaco ? estilo.espaco : ""}>
                Submit Message
            </button>
        </div>
    );
}
