import { Field, Textarea } from "@headlessui/react";


export default function chrip({ chirps } : any) {
    return (
        <>
            {chirps.length > 0 && chirps.map((chirp : any) => (
                < div className='bg-amber-600 flex mt-6 items-center justify-center flex-col rounded-2xl' >
                    <div className='flex justify-between w-full px-7'>
                        <span>
                            Name : {chirp.user.name}
                        </span>
                        <span>
                            Date : {chirp.updated_at.split('T')[0]}
                        </span>
                    </div>
                    <div className='self-start px-4 '>
                        <Field disabled>
                            <Textarea name="description" className='pl-2 bg-blue-400 w-100 rounded-xl h-auto' value={chirp.Chirp}></Textarea>
                        </Field>
                    </div>
                </div >
            ))}
        </>
    )
}