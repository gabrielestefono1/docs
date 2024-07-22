import estilo from "./ItemList.module.scss";

interface ItemListProps {
    texto: string;
}

export default function ItemList({ texto }: Readonly<ItemListProps>) {
    return (
        <div className={estilo.itemList}>
            <div></div>
            <p>{texto}</p>
        </div>
    );
}
