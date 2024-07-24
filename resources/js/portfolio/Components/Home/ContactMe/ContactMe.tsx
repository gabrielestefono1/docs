import ContactMeTop from "./ContactMeTop";
import ContactMeMiddle from "./ContactMeMiddle";
import ContactMeBottom from "./ContactMeBottom";

interface ContactMeProps {
    espaco?: boolean;
}

export default function ContactMe({ espaco }: Readonly<ContactMeProps>) {
    return (
        <div>
            <ContactMeTop />
            <ContactMeMiddle />
            {espaco ? <ContactMeBottom espaco={true} /> : <ContactMeBottom />}
        </div>
    );
}
