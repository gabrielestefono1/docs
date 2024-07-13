import {
    createContext,
    Dispatch,
    ReactNode,
    SetStateAction,
    useState,
    useMemo,
} from "react";
import { Ordem } from "../interfaces/OrdenacaoGeral";

interface OrdemContextProps {
    data: Ordem[];
    setData: Dispatch<SetStateAction<Ordem[]>>;
}

const OrdemContext = createContext<OrdemContextProps>({
    data: [],
    setData: () => {},
});

const OrdemContextProvider = ({ children }: { children: ReactNode }) => {
    const [data, setData] = useState<Ordem[]>([]);

    const value = useMemo(() => ({ data, setData }), [data, setData]);

    return (
        <OrdemContext.Provider value={value}>{children}</OrdemContext.Provider>
    );
};

export { OrdemContext, OrdemContextProvider };
