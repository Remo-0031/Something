import Chirp from '@/components/chips-listing';
import { Button } from '@/components/ui/button';
import { Textarea, Description, Field } from '@headlessui/react';
import { Form, router, useForm } from '@inertiajs/react';
import { Target, User } from 'lucide-react';
import { useEffect, useState } from 'react';



export default function index(prop: any) {
    const [currentText, SetcurrentText] = useState('');
    const { setData, post } = useForm({
        text: ''
    });
    const handleTextAreaChange = (e: { target: { value: any; }; }) => {
        // console.log(e.target.value);
        SetcurrentText(e.target.value);
    }
    useEffect(() => {
        SetcurrentText('');
        console.log(prop.chirps);

        // prop.chirps?.forEach((c: any) => {
        //     console.log(c.Chirp);
        // });
    }, [prop])

    useEffect(() => {
        // console.log(currentText);
        setData('text', currentText);
    }, [currentText]);

    const handleClick = () => {
        // console.log('clicked motherfucker');
        // console.log(currentText);
        post('/chirp', {
            onSuccess: () => {
                console.log('Chirped This bitch');
            }
        });
    }

    return (
        <>
            <div className='min-h-screen'>
                <header className="bg-red-800 h-12 flex items-center pl-2.5 justify-between fixed w-full">
                    <div className='flex space-x-7'>
                        <Target />
                        <div className='ml-13 flex '>
                            <ul className='flex  justify-between w-2xs'>
                                <li><a href='#'>Home</a></li>
                                <li><a href="#">Chat</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                    <div className='pr-8'>
                        <User size={28} absoluteStrokeWidth />
                    </div>
                </header>

                <div className='flex w-full justify-between bg-sidebar text-sidebar-foreground h-screen'>
                    <div className='bg-green-900 min-w-[80%] mt-12 justify-items-center relative overflow-auto no-scrollbar'>
                        <div className='bg-indigo-500 flex flex-col items-center space-y-2 pt-2'>
                            <div className=' w-xs flex justify-start mb-0'>
                                <label>What Do you want to Chirp!</label>
                            </div>
                            <div className='bg-pink-500 w-xs'>
                                <Textarea onChange={handleTextAreaChange} value={currentText} id="message" className="block p-2.5 w-full text-x text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." />
                            </div>
                            <div className='flex justify-start w-xs'>
                                <Button onClick={handleClick}>Chirp</Button>
                            </div>
                        </div>
                        <Chirp chirps={prop.chirps} />
                    </div>
                    <div className='bg-blue-800 min-w-[20%] mt-12'></div>
                </div>
            </div>
        </>
    )
}